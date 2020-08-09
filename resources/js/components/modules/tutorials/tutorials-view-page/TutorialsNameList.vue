<template>
    <div>
        <ul class="list-group">
            <li class="list-group-item" v-for="item in tutorials">
                <span class="badge badge-primary">#{{ item.id }}</span> {{ item.name }}
            </li>
        </ul>
    </div>
</template>

<script>

export default {
    name: 'TutorialsNameList',
    props: ['tutorials'],
    mounted () {

        console.log(this.tutorials)
    }
}
</script>
