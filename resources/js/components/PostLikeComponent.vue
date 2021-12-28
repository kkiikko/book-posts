
<template>
    <span class="float-right">
      {{this.postlikeCount}}
      <button v-if="!liked" type="button" class="btn-sm shadow-none border border-primary p-2" @click="like(postId)"><i class="mr-1 fas fa-user-plus"></i>いいね</button>
      <button  v-else type="button" class="btn-sm shadow-none border border-primary p-2 bg-primary text-white" @click="unlike(postId)"><i class="mr-1 fas fa-user-check"></i>いいね済</button>
    </span>
</template>

<script>
    export default {
        props:['postId', 'userId'],
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
          like(postId) {
            let url = `/users/${postId}/store`

            axios.post(url)
            .then(response => {
                this.liked = true;
                this.likeCount = response.data.likeCount;
            })
            .catch(error => {
              alert(error)
            });
          },
          unlike(postId) {
            let url = `/users/${postId}/destroy`

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
