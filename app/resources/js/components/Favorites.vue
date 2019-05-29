<template>
  <div id="rankpage">
    <div class="list" :style="{background:color}" v-if="!_.isEmpty(topListData)">
      <ul>
        <li class="border-1px border-1px-after" v-for="(item,index) in topListData">
          <div class="music-index" :class="{dark:isDark}">{{index+1}}</div>
          <div class="music-info" @click="play(item.id)">
            <div class="music-name" :class="{dark:isDark}">
              {{item.music.name}}
            </div>
            <div class="music-singer">
              <span >{{item.music.artist.name}} - {{ item.music.categorie.name }}</span>
            </div>
          </div>

          <div class="play-button" @click="unlike(item.id, index)">
            <img style="width: 30px;" src="../assets/icon-unlike.png">
          </div>
        <div class="play-button" @click="play(index)">
          <img src="/images/icon-play.png" class="play-bar-button">
        </div>

        </li>
      </ul>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">

  export default {
    data () {
      return {
        topListData: null,
        opacity: 0,
        menuedIndex: 0,
        topid:26
      }
    },
    methods: {

      fetchData()
      {
        axios.get('favorites').then((response) => {
            if (response.data.status)
            {
              this.topListData = response.data.favorites;
            }
        });
      },

      unlike(id, index)
      {
        axios.delete('favorites/unlike/' + id).then((response) => {
            if (response.data.status)
            {
              this.$delete(this.topListData, index);
            }
        });
      },

      play: function (index) {
        let list = []
        this.topListData.forEach(item => {
          list.push({
            id: item.id,
            mid: item.music.file,
            name: item.music.name,
            singer: item.music.artist,
            albummid: item.music.categorie,
            favorie: item.music.is_favorited
          })
        })

        this.$store.commit('setPlayList', {
          index: index,
          list: list
        })
        this.$store.commit('play')
      },
    },
    computed: {
      color: function () {
        return '#ff91aa';
      },

      gradientcolor: function () {
        return '-webkit-linear-gradient(top, rgba(' + this.r + ',' + this.g + ',' + this.b + ', 0), ' + this.color + ')'
      },
      isDark: function () {
        var grayLevel = this.r * 0.299 + this.g * 0.587 + this.b * 0.114
        return (grayLevel < 192)
      },
    },
    created: function () {
      this.fetchData();
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  * {
    margin: 0;
    padding: 0;
  }

  .tab-swiper {
    background-color: #fff;
    height: 100px;
  }

  /*border-1px 部分*/
  .border-1px {
    position: relative;
  }

  .border-1px-after:after {
    border-top: 1px solid rgba(255, 255, 255, .15);
    content: ' ';
    display: block;
    width: 100%;
    position: absolute;
    left: 0;
  }

  .border-1px-before:before {
    border-top: 1px solid rgba(255, 255, 255, .15);
    content: ' ';
    display: block;
    width: 100%;
    position: absolute;
    left: 0;
  }

  .border-1px:before {
    top: 0;
  }

  .border-1px:after {
    bottom: 0;
  }

  @media (-webkit-min-device-pixel-ratio: 1.5), (min-device-pixel-ratio: 1.5) {
    .border-1px:after, .border-1px:before {
      -webkit-transform: scaleY(.7);
      -webkit-transform-origin: 0 0;
      transform: scaleY(.7);
    }

    .border-1px:after {
      -webkit-transform-origin: left bottom;
    }
  }

  @media (-webkit-min-device-pixel-ratio: 2), (min-device-pixel-ratio: 2) {
    .border-1px:after, .border-1px:before {
      -webkit-transform: scaleY(.5);
      transform: scaleY(.5);
    }
  }

  #rankpage {
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 68vh;
    min-height: 100%;
    overflow-x: hidden;
    top: 0;
    background: #fff;
    z-index: 2;
    margin-top: 50px;
  }


  .list {
    /*background: rgb(135, 112, 101);*/
    z-index: 1;
    padding-bottom: 50px;
  }

  .list .list-title {
    text-align: center;
    line-height: 40px;
  }

  .list ul {
    list-style: none;
    padding-left: 10px;
  }

  .list ul li {
    display: flex;
    display: -webkit-flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    height: 60px;
    margin-left:44px;
    cursor:pointer;
  }

  .list ul li .music-index{
    margin-left: -50px;
    width: 50px;
    text-align: center;
  }

  .list ul li .music-info {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    overflow: hidden;
  }

  .list ul li .music-info .music-name {
    width: 100%;
    color: #000;
    line-height: 22px;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
  }

  .dark {
    color: #fff !important;
  }

  .list ul li .music-info .music-singer {
    color: #aaa;
    font-size: 14px;
    line-height: 22px;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
  }

  .list ul li .action-button {
    width: 25px;
    height: 25px;
    margin-right: 10px;
  }

  .list ul li .action-button img {
    width: 25px;
    height: 25px;
  }

  .list .singer-brief {
    font-size: 14px;
    padding: 10px;
  }
</style>
