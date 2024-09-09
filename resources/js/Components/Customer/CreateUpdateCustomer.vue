<script setup>
import { useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import InputError from '@/Components/InputError.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import axios from 'axios';

const emit = defineEmits(['close', 'onCreate']);

const props = defineProps({
    actions: {
        type: String
    },
    customer: {
        type: Object,
        default: null
    }
})

const action = props.actions || 'CREATE';

const form = useForm({
    name: props.customer?.name || '',
    email: props.customer?.email || '',
    phone_number: props.customer?.phone_number || '',
    address: props.customer?.address || '',
    country: props.customer?.country || '',
    city: props.customer?.city || '',
});

function submitCreate() {
    axios.post(route('customers.store'), form.data()).then(response => {
        console.log('Response', response)
        emit('onCreate')
        emit('close')
    })
}

function submitUpdate() {
    axios.put(route('customers.update', {customer: props.customer.id}), form.data()).then(response => {
        console.log('Response', response)
        emit('onUpdate')
        emit('close')
    })
}

function submit() {
    form.processing = true;
    
    if (action === 'CREATE') {
        submitCreate();
    } else {
        submitUpdate();
    }
    
    form.processing = false;
    form.reset()
}

</script>
<template>
    <section class="flex flex-col gap-5">
        <div>
            <InputLabel for="customer.name" value="Name" />
            <TextInput
                id="customer.name"
                ref="nameInput"
                v-model="form.name"
                class="mt-1 block w-full"
            />
            <InputError :message="form.errors.name" class="mt-2" />
        </div>
        <div>
            <InputLabel for="customer.email" value="Email" />
            <TextInput
                id="customer.email"
                ref="emailInput"
                v-model="form.email"
                class="mt-1 block w-full"
                type="email"
            />
            <InputError :message="form.errors.email" class="mt-2" />
        </div>
        <div>
            <InputLabel for="customer.phone_number" value="Phone number" />
            <TextInput
                id="customer.phone_number"
                ref="phone_numberInput"
                v-model="form.phone_number"
                class="mt-1 block w-full"
                type="tel"
            />
            <InputError :message="form.errors.phone_number" class="mt-2" />
        </div>
        <div>
            <InputLabel for="customer.address" value="Address" />
            <TextInput
                id="customer.address"
                ref="addressInput"
                v-model="form.address"
                class="mt-1 block w-full"
            />
            <InputError :message="form.errors.address" class="mt-2" />
        </div>
        <div class="flex justify-between gap-5">
            <div class="flex-1">
                <InputLabel for="customer.city" value="City" />
                <TextInput
                    id="customer.city"
                    ref="cityInput"
                    v-model="form.city"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.city" class="mt-2" />
            </div>
            <div class="flex-1">
                <InputLabel for="customer.country" value="Country" />
                <TextInput
                    id="customer.country"
                    ref="countryInput"
                    v-model="form.country"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.country" class="mt-2" />
            </div>
        </div>
        <div class="flex justify-between mt-5 gap-5">
            <SecondaryButton @click="emit('close')">
                Close
            </SecondaryButton>
            <PrimaryButton @click="submit" class="bg-app-blue" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                <span v-if="action === 'CREATE'">Create</span>
                <span v-else="action === 'CREATE'">Update</span>
            </PrimaryButton>
        </div>
    </section>
</template>