<template>
    <error-layout>
        <template #header>
                Les séraphins
        </template>
        <p>
            <ul>
                <li v-for="etablissement in etablissementList" :key="etablissement.id" class="mb-3">
                    <a :href="route('home',[etablissement.id,etablissement.nom])" class="btn btn-button btn-dark w-100"><i class="fa fa-school mr-2 float-left" aria-hidden="true"></i> {{ etablissement.nom }}</a>
                </li>
            </ul>
        </p>
    </error-layout>
</template>

<script>
    import ErrorLayout from '@/Layouts/ErrorLayout';

    export default {
        components: {
            ErrorLayout,
        },
        data() {
            return {
                etablissementList: this.etablissements
            }
        },
        props: ['etablissements', 'instituts'],
        mounted() {

        },
        methods: {

        }
    }
</script>
