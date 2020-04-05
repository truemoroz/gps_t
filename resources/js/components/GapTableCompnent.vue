<template>
    <CCardBody>
        <CDataTable
            :items="items"
            :fields="fields"
            hover
            >
        </CDataTable>
    </CCardBody>

</template>

<script>
    export default {
        name: "GapTableComponent",
        data: () => ({
              items:  [],
            fields: [
                { key: 'start', _style:'width:40%', label: 'Начало резкого изменения' },
                { key: 'end', _style:'width:40%;', label: 'Конец резкого изменения'},
                { key: 'jump', _style:'width:20%;', label: 'Разница уровней' },
            ],
        }),
        mounted() {
            this.getData();
        },
        methods: {
            getData: function () {
                fetch('/get_gap/')
                    .then((response) => {
                        if (response.ok) {
                            return response.json();
                        }

                        throw new Error('Network response was not ok');
                    })
                    .then((json) => {
                        if (json) {
                            this.items = json;
                        }
                    })
                    .catch((error) => {

                        console.log(error);
                    })

            },
        }
    }
</script>

<style scoped>

</style>
