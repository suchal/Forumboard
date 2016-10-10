<template>
    <button class="tiny_button notification_button" @click="show=!show">
      <i class="fa fa-bell" aria-hidden="true"></i>
    </button>
  <div v-if="show" class="notification">
  <ul class="notification__list">
    <li class="notification__item" v-for="notification in notifications">
        {{notification.data.comment_username}} left a comment on your post <a href="{{ notification.data.post_slug }}">{{ notification.data.post_title }}</a>
    </li>
  </ul>
</div> 
</template>

<script>
  export default {
    data(){
        return{
        notifications: [
        ],
        show:0
        }    
    },
    created(){
    this.$http.post('/api/notifications', {'api_token': Laravel.api_token}).then((response) => {
        self = this;
        response.body.forEach(function(item, index){
            self.notifications.push(item.data);
        })
      }, (response) => {
      });
    }

}
</script>

<style type="sass">
  .notification_button{
    margin-top:15px;
  }
  .notification__item{
    color: #000;
  }
  .notification__item > a{
    color: #000;
  }
</style>