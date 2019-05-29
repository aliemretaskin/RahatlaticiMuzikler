<template>
  <div class="rank">
    <ul>
      <li class="rank-item" v-for="item in topList" @click="showRank(item.id)">
        <div class="rank-media">
          <img v-lazy="item.picture" alt="">
        </div>
        <div class="rank-info">
          <p class="rank-title">{{item.name}}</p>
        </div>
      </li>
    </ul>
  </div>
</template>

<script type="text/ecmascript-6">
  import RankPage from './RankPage'
  export default {
    components: {RankPage},
    data () {
      return {
        topList: null
      }
    },
    methods: {
      showRank: function (id) {
        this.$router.push({name: 'rank', params: {id: id}})
      },
      fetchData()
      {
        axios.get('albums').then((response) => {
            if (response.data.status)
            {
              this.topList = response.data.albums;
            }
        });
      },
    },
    created: function () {
      this.fetchData();
    },
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

  .rank {
    width: 100%;
  }

  .rank ul {
    margin-top: 60px;
    padding: 10px;
    margin-bottom: 50px;
    display: flex;
    flex-direction: column;
    list-style: none;
  }

  .rank-item {
    display: flex;
    flex-direction: row;
    height: 100px;
    background: #fff;
    margin-bottom: 10px;
    box-shadow: 0 0 10px #DDD;
    border-radius: 5px;
    overflow: hidden;
    cursor:pointer;
  }

  .rank-item .rank-media {
    width: 100px;
    height: 100px;
    position: relative;
  }

  .rank-item .rank-media img {
    width: 100px;
    height: 100px;
    border-bottom-left-radius: 5px;
    border-top-left-radius: 5px;
    z-index: 0;
  }

  .rank-item .rank-media .listen-count {
    position: absolute;
    bottom: 3px;
    left: 5px;
    color: #fff;
    font-size: 12px;
  }

  .rank-item .rank-info {
    padding: 5px 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    overflow: hidden;
  }

  .rank-item .rank-info .rank-title {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }

  .rank-item .rank-info .rank-songs {
    font-size: 14px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }

  .rank-item .rank-info .rank-singername {
    color: #8f8f8f;
  }

</style>
