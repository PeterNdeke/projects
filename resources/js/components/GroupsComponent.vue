<template>
  <div class="top-profiles">
    <div class="pf-hd">
      <h3>Your groups</h3>
      <i class="la la-ellipsis-v"></i>
    </div>
    <div class="groups-slider">
      <hooper
        :settings="hooperSettings"
        style="height: 250px"
        :progress="true"
        :autoPlay="true"
        :playSpeed="2000"
      >
        <slide v-for="(slide, indx) in groups" :key="indx" :index="indx">
          <div class="group-profy">
            <img v-bind:src="slide.logo" alt>
            <h3>{{slide.group_name}}</h3>
            <span>2500 Members</span>

            <a :href=" '/group/' + slide.slug " title>View Group</a>
          </div>
        </slide>
        <!--group-profy end-->
      </hooper>
    </div>
    <!--profiles-slider end-->
  </div>
  <!--top-profiles end-->
</template>

<script>
import { Hooper, Slide } from "hooper";
import "hooper/dist/hooper.css";

export default {
  name: "App",
  components: {
    Hooper,
    Slide
  },
  data() {
    return {
      hooperSettings: {
        itemsToShow: 4
      }
    };
  },

  mounted() {
    this.getAllGroups();
  },

  computed: {
    groups() {
      //return this.$store.state.posts;
      return this.$store.getters.get_all_groups;
    }
  },
  methods: {
    getAllGroups() {
      axios.get("/all-groups").then(response => {
        if (!response.data.error) {
          response.data.forEach(group => {
            this.$store.commit("add_group", group);
          });
        }
      });
    }
  }
};
</script>

<style>
</style>
