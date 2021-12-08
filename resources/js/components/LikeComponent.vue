
<template>
    <span class="float-right">
      {{this.likeCount}}
      <button v-if="!liked" type="button" class="btn-sm shadow-none border border-primary p-2" @click="like(userId)"><i class="mr-1 fas fa-user-plus"></i>いいね</button>
      <button  v-else type="button" class="btn-sm shadow-none border border-primary p-2 bg-primary text-white" @click="unlike(userId)"><i class="mr-1 fas fa-user-check"></i>いいね済</button>
    </span>
</template>

<script>
    export default {
        props:['userId', 'defaultLiked', 'defaultCount'],
        data() {
          return{
              liked: false,
              likeCount: 0,
          };
        },
        created() {
          this.liked = this.defaultLiked
          this.likeCount = this.defaultCount
        },

        methods: {
          like(userId) {
            let url = `/users/${userId}/store`

            axios.post(url)
            .then(response => {
                this.liked = true;
                this.likeCount = response.data.likeCount;
            })
            .catch(error => {
              alert(error)
            });
          },
          unlike(userId) {
            let url = `/users/${userId}/destroy`

            axios.post(url)
            .then(response => {
                this.liked = false;
                this.likeCount = response.data.likeCount;
            })
            .catch(error => {
              alert(error)
            });
          }
        }
    }
</script>
