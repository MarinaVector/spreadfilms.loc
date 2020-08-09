<template>
    <div>
        <ul class="list-group">
            <li class="list-group-item" v-for="item in tutorials">{{item.id}}

            </li>
        </ul>
    </div>
</template>

<script>
//let data11 = @json($companyTutorials);
export default {
    name: 'TutorialsNameList',
    props: ['tutorials'],
    mounted () {

        console.log(this.tutorials)
    }
}
</script>
