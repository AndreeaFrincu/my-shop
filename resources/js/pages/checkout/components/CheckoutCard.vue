<template>
    <div class="checkout-card-content">
        <md-card class="checkout-card">
            <checkout-toolbar></checkout-toolbar>
            <div class="card-container">
                <app-select
                    v-model="option"
                    :options="countryList">
                    <template #option="props">
                        {{ getOptionName(props) }}
                    </template>

                    <template
                        #selected="props">
                        {{ getSelectedName(props) }}
                    </template>
                </app-select>
                <p v-if="option !== null">{{ option.name }}</p>
                <p v-else></p>
            </div>
        </md-card>
    </div>
</template>

<script>
import CheckoutToolbar from "./CheckoutToolbar";
import AppSelect from "../../../components/AppSelect";
import _ from 'lodash'

export default {
    name: "CheckoutCard",
    components: {AppSelect, CheckoutToolbar},
    data: () => ({
        option: null,
        countryList: [
            {
                id: 1,
                name: 'option1'
            },
            {
                id: 2,
                name: 'option2'
            },
            {
                id: 3,
                name: 'option3'
            },
            {
                id: 4,
                name: 'option4'
            }
        ],
        regionList: [
            {
                id: 1,
                name: 'option1'
            },
            {
                id: 2,
                name: 'option2'
            },
            {
                id: 3,
                name: 'option3'
            },
            {
                id: 4,
                name: 'option4'
            }
        ]
    }),
    methods: {
        getOptionName(prop) {
            const result = _.get(prop, 'data.name')
            return result ? `xxx ${result}` : '-'
        },
        getSelectedName(prop) {
            const result = _.get(prop, 'data.name')
            return result ? `yyy ${result}` : '-'
        }
    },
    computed: {}
}
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css?family=Material+Icons");

.checkout-card-content {
    display: flex;
    flex-direction: column;
    width: 90%;
    align-self: center;
    margin-top: 20px;
}

.checkout-card {
    width: 100%;
    height: 600px;
    display: flex;
    align-items: center;
    flex-direction: column;
}

.card-container {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    padding: 20px;
}

</style>
