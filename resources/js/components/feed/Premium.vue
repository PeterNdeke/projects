<template>
  <div class="top-profiles">
    <div class="pf-hd">
      <h3>Premium Profiles</h3>
      <i class="la la-ellipsis-v"></i>
    </div>
    <div class="profiles-slider">
      <hooper
        :settings="hooperSettings"
        style="height: 250px"
        :progress="true"
        :autoPlay="true"
        :playSpeed="2000"
      >
        <slide>
          <div class="user-profy">
            <img src="images/resources/user1.png" alt>
            <h3>John Doe</h3>
            <span>Graphic Designer</span>
            <ul>
              <li>
                <a href="#" title class="followw">Connect</a>
              </li>
            </ul>
            <a href="user-profile.html" title>View Profile</a>
          </div>
          <!--user-profy end-->
        </slide>
        <slide>
          <div class="user-profy">
            <img src="images/resources/user2.png" alt>
            <h3>John Doe</h3>
            <span>Graphic Designer</span>
            <ul>
              <li>
                <a href="user-profile.html" title class="followw">Connect</a>
              </li>
            </ul>
            <a href="#" title>View Profile</a>
          </div>
          <!--user-profy end-->
        </slide>
        <slide>
          <div class="user-profy">
            <img src="images/resources/user3.png" alt>
            <h3>John Doe</h3>
            <span>Graphic Designer</span>
            <ul>
              <li>
                <a href="#" title class="followw">Connect</a>
              </li>
            </ul>
            <a href="user-profile.html" title>View Profile</a>
          </div>
          <!--user-profy end-->
        </slide>
        <slide>
          <div class="user-profy">
            <img src="images/resources/user1.png" alt>
            <h3>John Doe</h3>
            <span>Graphic Designer</span>
            <ul>
              <li>
                <a href="#" title class="followw">Connect</a>
              </li>
            </ul>
            <a href="user-profile.html" title>View Profile</a>
          </div>
          <!--user-profy end-->
        </slide>
        <slide>
          <div class="user-profy">
            <img src="images/resources/user2.png" alt>
            <h3>John Doe</h3>
            <span>Graphic Designer</span>
            <ul>
              <li>
                <a href="#" title class="followw">Connect</a>
              </li>
            </ul>
            <a href="user-profile.html" title>View Profile</a>
          </div>
          <!--user-profy end-->
        </slide>
        <slide>
          <div class="user-profy">
            <img src="images/resources/user3.png" alt>
            <h3>John Doe</h3>
            <span>Graphic Designer</span>
            <ul>
              <li>
                <a href="#" title class="followw">Connect</a>
              </li>
            </ul>
            <a href="user-profile.html" title>View Profile</a>
          </div>
          <!--user-profy end-->
        </slide>
      </hooper>
    </div>
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
        itemsToShow: 3
      }
    };
  }
};
</script>