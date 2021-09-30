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

<style lang="scss">

$primary-color: #448aff;
$gray-color: #f2f2f2;

.table {
    width: 100%;
    box-shadow: 0 6px 10px -4px rgba(0, 0, 0, 0.15);
}

.arrow {
    transition: all 0.2s;
&.rotate {
     transform: rotateY(90deg);
 }
}
td,
th {
    padding: 10px;
}

tr:nth-child(even) {
    background-color: $gray-color;
}

/** Click on products from cart */
//tr:hover {
//    background-color: #ddd;
//    transition: background-color 0.2s ease-in;
//    cursor: pointer;
//}

th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: $primary-color;
    color: white;
}

</style>
