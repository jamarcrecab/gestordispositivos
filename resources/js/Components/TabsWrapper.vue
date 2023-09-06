<template>
    <div class="w-25">
        <ul class=" hover:cursor-pointer flex flex-row gap-x-5">
            <li class="border-b-4 w-25 border-teal-600" v-for="title in tabTitles" :key="title" @click="selectedTitle = title">
                {{ title }}
            </li>

        </ul>

        <slot />

    </div>
</template>


<script>
import { provide, ref } from 'vue';

    export default {

        setup( props, { slots }){

            const tabTitles = ref(slots.default().map((tab) => tab.props.title))
            const selectedTitle = ref(tabTitles.value[0])

            provide('selectedTitle',selectedTitle)
            return {

                selectedTitle,
                tabTitles,

            }

        },

    }



</script>