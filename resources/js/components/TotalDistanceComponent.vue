<template>
    <CRow>
        <CCol col="12" sm="1"></CCol>

        <CCol col="12" sm="6">
            <CCallout color="info">
                <small class="text-muted">Общий пробег, км</small><br>
                <strong class="h4">{{ distance }}</strong>
            </CCallout>
        </CCol>
    </CRow>
</template>

<script>
    export default {
        name: "TotalDistanceComponent",
        data: () => ({
            distance: 0,
        }),
        mounted() {
            this.getData();
        },
        methods: {
            getData: function () {
                fetch('/get_distance/')
                    .then((response) => {
                        if (response.ok) {
                            return response.json();
                        }

                        throw new Error('Network response was not ok');
                    })
                    .then((json) => {
                        if (json) {
                            this.distance = json;
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
