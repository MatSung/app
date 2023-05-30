<script setup>
import { reactive } from 'vue';
import DefaultLayout from '../layouts/DefaultLayout.vue';

const form = reactive({
    provider: 'exchangerate.host',
    amount: 0,
    from: 'EUR',
    to: 'USD',

});

</script>

<template>
    <DefaultLayout>
        <template #header>
            <h1>Exchange Rate Calculator</h1>
        </template>
        <template #main>
            <div class="bg-light rounded-1 border my-4 p-4">
                <form action="">
                    <div class="row g-3">

                        <div class="col">
                            <select class="form-select" name="provider" id="provider" v-model="form.provider">
                                <option value="exchangerate.host">exchangerate.host</option>
                                <option value="coinapi">coinApi</option>
                            </select>
                        </div>
                        <div class="col">
                            <!-- <label for="amount" class="form-label">Amount</label> -->
                            <input class="form-control" type="number" id="amount" maxlength="10" min="0" placeholder="0" v-model="form.amount">
                        </div>

                        <div class="col">
                            <input class="form-control" type="text" placeholder="EUR" v-model="form.from">
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" placeholder="USD" v-model="form.to">
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" placeholder="EUR">
                        </div>
                        
                    </div>
                </form>
            </div>
        </template>
    </DefaultLayout>
</template>