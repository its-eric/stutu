<template>
  <div id="talkjs-container" style="width: calc(100% - 30px); margin: 10px; min-height: 150px"></div>  
</template>
<script>
import { mapGetters } from 'vuex'
import axios from 'axios'
const Talk = require('talkjs')
  
export default {
  name: 'Chat',

  middleware: 'auth',

  computed: mapGetters({
    user: 'auth/user'
  }),

  mounted() {
    
    Talk.ready.then(() => {
      var me = new Talk.User({
        id: this.user.id,
        name: this.user.name,
        email: this.user.email,
        photoUrl: this.user.photo_url,
        welcomeMessage: "We have to figure out what an user should say when first contacted, honestly.",
        configuration: this.user.role
      });
      window.talkSession = new Talk.Session({
        appId: "t87qGQA2",
        me: me
      });
      var other = new Talk.User({
        id: "54321",
        name: "Ronald Raygun",
        email: "ronald@teflon.com",
        photoUrl: "https://talkjs.com/docs/img/ronald.jpg",
        welcomeMessage: "Hey, how can I help?",
        configuration: "tutor"
      });

      var conversation = talkSession.getOrCreateConversation(Talk.oneOnOneId(me, other));
      conversation.setParticipant(me);
      conversation.setParticipant(other);
      var inbox = talkSession.createInbox({selected: conversation});
      inbox.mount(document.getElementById("talkjs-container"));
    })
  }

}
</script>