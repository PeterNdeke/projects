<template>
  <div class="suggestions full-width">
    <div class="sd-title">
      <h3>People You May Know</h3>
      <i class="la la-ellipsis-v"></i>
    </div>
    <!--sd-title end-->
    <div class="suggestions-list">
      <div class="suggestion-usd" v-for="item in suggestions" :key="item.key">
        <img v-bind:src="item.suggestedUser.avatar" alt>
        <div class="sgt-text">
          <h4>{{item.suggestedUser.name}}</h4>
          <span>{{item.mutualFriendsCount}} mutual friends</span>
        </div>
        <span>
          <a href="#" title="Remove">
            <i class="la la-trash"></i>
          </a>
        </span>
        <span>
          <a
            href="#"
            title="Add Connection"
            v-if="status === 0"
            @click.prevent="add_connect(item.suggestedUser.id)"
          >
            <i class="la la-plus"></i>
          </a>
          <p class="text-center" v-else>Connection Request Sent</p>
        </span>
      </div>

      <div class="view-more">
        <a href="#" title>View More</a>
      </div>
    </div>
    <!--suggestions-list end-->
  </div>
  <!--suggestions end-->
</template>

<script>
export default {
  data() {
    return {
      status: 0,
      title: "Add Connection",
      loading: true
    };
  },
  computed: {
    suggestions() {
      return this.$store.getters.get_all_suggestions;
    }
  },
  mounted() {
    this.getSuggestions();
  },
  methods: {
    getSuggestions() {
      axios.get("/get_friends_suggestion").then(response => {
        if (!response.data.error) {
          response.data.forEach(suggestion => {
            this.$store.commit("add_suggestion", suggestion);
          });
        }
      });
    },
    add_connect(id) {
      this.loading = true;
      axios.get("/add_connect/" + id).then(res => {
        if (res.data == 1) {
          this.status = 1;
          toast.fire({
            type: "success",
            title: "Connection request sent"
          });
          this.loading = false;
        }
      });
    }
  }
};
</script>

<style>
</style>
