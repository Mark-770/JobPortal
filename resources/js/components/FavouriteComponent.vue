<template>
    <div>

        <button v-if="show" @click.prevent="unSave()"  class="btn btn-dark mt-2" style="width:100%;">UnSave</button>
        <button v-else @click.prevent="save()" class="btn btn-primary mt-2" style="width:100%;">Save</button>


    </div>
</template>

<script>
    export default {
        props:['jobid','favorited'],


        data(){
            return{
                'show':true
            }
        },
        mounted() {
            this.show = this.jobFavorited ? true:false;
        },
        computed:{
            jobFavorited(){
                return this.favorited
            }
        },
        methods:{
            save(){
                axios.post('/save/'+this.jobid).then(response=>this.show=true).catch(error=>alert("error Save"))
            },
            unSave(){
                axios.post('/unsave/'+this.jobid).then(response=>this.show = false).catch(error=>alert("error UnSave"))
            }

        }

    }
</script>
