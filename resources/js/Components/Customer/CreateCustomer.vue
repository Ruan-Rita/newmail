<script setup>
import { useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import InputError from '@/Components/InputError.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import axios from 'axios';

const emit = defineEmits(['close', 'onCreate']);

const props = defineEmits({
    actions: {
        type: String
    }
})

const action = this.props.action || 'CREATE';

const form = useForm({
    name: 'ruan rita',
    email: 'ruan@gmail.com',
    phone_number: '5512988437057',
    address: 'rua de tal',
    country: 'United State',
    city: 'Cruzeiro',
});

function submitCreate() {
    axios.post(route('customers.store'), form.data()).then(response => {
        console.log('Response', response)
        emit('onCreate')
        emit('close')
    })
}

function submitUpdate() {
    axios.post(route('customers.store'), form.data()).then(response => {
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
                Continue
            </PrimaryButton>
        </div>
    </section>
</template>