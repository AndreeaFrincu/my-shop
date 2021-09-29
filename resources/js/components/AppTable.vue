<template>
    <table class="app-table">
        <thead>
        <slot name="columns">
            <th v-for="column in columns">
                {{ column }}
            </th>
        </slot>
        </thead>
        <tbody>
            <template v-for="item in data">
                <tr>
                    <slot :row="item">
                        <td
                            v-for="column in columns"
                            v-if="hasValue(item, column)">
                            {{ itemValue(item, column) }}
                        </td>
                    </slot>
                </tr>
            </template>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "AppTable",
    props: {
        columns: [],
        data: []
    },
    methods: {
        hasValue(item, column) {
            return item[column.toLowerCase()] !== "undefined";
        },
        itemValue(item, column) {
            return item[column.toLowerCase()];
        }
    }
}
</script>

<style scoped>

</style>
