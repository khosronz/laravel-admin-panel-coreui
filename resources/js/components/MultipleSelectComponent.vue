<template>
    <div>
        <div class="mt-3 sr-only">Selected: <strong>{{ selected }}</strong></div>
        <b-form-select v-model="selected" :options="options" multiple :select-size="15"></b-form-select>
        <button class="btn btn-success mt-3" @click="setProductAttribetes()">اتصال ویژگی های مورد نیاز محصول</button>
        <button class="btn btn-info mt-3 text-white" @click="createProductAttribeteValues()">اتصال ویژگی های مورد نیاز محصول
        </button>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        props: ['product_id'],
        data() {
            return {
                selected: [], // Array reference of selected attributes for mapping
                options: [], // Array reference of attributes[id]=admin_name
                dataSend: []
            }
        },
        ///////
        mounted() {
            axios.get('http://project3.test/api/attributes')
                .then(response => {
                    // JSON responses are automatically parsed.
                    this.options = response.data.data;
                })
                .catch(e => {
                    this.errors.push(e)
                })

            this.getProductAttribetes()
        },
        methods: {
            getProductAttribetes() {
                axios.get('http://project3.test/api/products/' + this.product_id + '/attributes')
                    .then(response => {
                        console.log(response.data)
                        this.selected = response.data.data;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })
            },

            setProductAttribetes() {
                // Delete product attributes from AttributeProductMapping and save selected array for Mapping

                this.dataSend = {
                    'product_id': this.product_id,
                    'selected': this.selected
                }
                axios.post('http://project3.test/api/attribute_product_mappings', this.dataSend)
                    .then(response => {
                        this.selected = response.data.data;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })

                // this.getProductAttribetes()
            },

            createProductAttribeteValues() {
                axios.get('http://project3.test/api/attribute_product_values', this.dataSend)
                    .then(response => {
                        this.selected = response.data.data;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })

                // this.getProductAttribetes()
            }
        }
    }
</script>

<style lang="scss">
    @import '~bootstrap-vue/dist/bootstrap-vue.css';
</style>