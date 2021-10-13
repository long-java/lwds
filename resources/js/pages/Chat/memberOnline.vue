<template>
    <div>
        <div class="title">
            <h5>Đang trong phòng chat.</h5>
        </div>

        <div class="member">



            <div class="item"   v-for="(member, index) in membersOnline" :key="index">
                <div class="avatar">
                    <img :src="member.avatar" alt="">
                </div>

                <div class="name">
                    <div>
                        <p>{{ member.name }}</p>
                    </div>
                </div>

                <div class="online">
                    <font-awesome-icon icon="globe-africa"  size="1x" :style="{ color: '#ffff88' }"   />
                </div>

            </div>



        </div>
    </div>

</template>

<script>
export default {
    props: ['membersOnline'],

    data(){
        return {
            
        }
    }

}
</script>

<style scoped>
    .member{
        margin-top: 25px;
    }

    .title{
        margin-top: 15px;
        padding-left: 10px;
    }

    .title h5{
        font-size: 15px;
    }

    .online{
        width: 15%;
        padding-top: 5px;

    }

    .title h5{
        font-weight: bold;
        color: rgb(0, 0, 0);

    }

    .item{
        display: flex;

        padding-left: 10px;
    }

    .avatar img{
        width: 32px;
        height: 32px;
        border-radius: 50%;
    }

    .name{
        margin-left: 15px;
        width: 85%;
    }

    .name p{
        font-weight: bold;
        margin-top: 5px;
        


                overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 1; /* number of lines to show */
        -webkit-box-orient: vertical;
    }


</style>