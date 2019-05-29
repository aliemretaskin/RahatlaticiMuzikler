/**
 * Created by sioxa on 2016/12/25 0025.
 */
import * as def from '../config/def'
import store from './index'
const player = new QMplayer();
player.on("timeupdate", function () {
    store.commit(
        "updateCurrentTime",
        parseInt(player.currentTime)
      );
      store.commit(
        "updateDuration",
        parseInt(player.duration)
      );
});
player.on("ended", function () {
    store.commit("playContinue");
});
export default {
  state: {
    playing: false,
    currentTime: 0,
    duration: 0,
    playMode: def.SEQUENTIAL,
    index: 0,
    song: {
      name: def.DEFAULT_SONG_NAME,
      albummid: {},
      singer: {},
    },
    playList: []
  },
  mutations: {
    playIndex (state, index) {
      state.index = index
      state.song = state.playList[index]
    },
    setPlayList (state, playList) {
      state.playList = playList.list
      state.index = playList.index
      state.song = state.playList[state.index]
    },
    addToPlayList (state, item) {
      state.playList.push(item)
    },
    deleteFromPlayList (state, index) {
      if (isNaN(index) || index >= state.playList.length) {
        return false
      }
      if (index === state.index) {
        if (state.index === 0 && state.playList.length === 1) {
          state.song = {
            name: def.DEFAULT_SONG_NAME,
            singer: ''
          }
          state.coverImgUrl = def.DEFAULT_IMG
        } else {
          state.song = state.playList[state.index + 1]
        }
      } else if (index < state.index) {
        state.index--
      }
      state.playList.splice(index, 1)

    },
    addToPlayListAsNextPlay (state, item) {
      state.playList.splice(state.index + 1, 0, item)
    },
    updateCurrentTime (state, time) {
      state.currentTime = time
    },
    updateDuration (state, time) {
      state.duration = time
    },
    play (state) {
      player.pause();
      player.currentTime = 0;
      player.play(state.song.mid);
      state.playing = true;
    },
    pause (state) {
      player.pause();
      state.playing = false
    },
    playFront (state) {
      state.index = (state.index - 1 + state.playList.length) % state.playList.length
      state.song = state.playList[state.index]
      player.play(state.song.mid);
    },
    playNext (state) {
      state.index = (state.index + 1) % state.playList.length
      state.song = state.playList[state.index]

      //console.log(player.__.audio.volume = 0);

      player.pause();
      player.currentTime = 0;
      //state.playing = false;
      player.play(state.song.mid);
      //state.playing = true;
    },
    playContinue (state) {
      switch (state.playMode) {
        case def.SINGLE:
          break
        case def.SEQUENTIAL:
          state.index = (state.index + 1) % state.playList.length
          state.song = state.playList[state.index]
          break
        case def.RANDOM:
          state.index = Math.floor(Math.random() * state.playList.length)
          state.song = state.playList[state.index]
          break
      }
      player.play(state.song.mid);
    },
    changePlayMode (state) {
      state.playMode = (state.playMode + 1) % 3
    },
    setAlbummid(state,albummid){
      state.song = {...state.song,albummid}
    }
  },
  getters: {
    currentTime: state =>
    parseInt(state.currentTime / 60) + ':' + (Array(2).join(0) + (state.currentTime % 60)).slice(-2)
    ,
    duration: state =>
    parseInt(state.duration / 60) + ':' + (Array(2).join(0) + (state.duration % 60)).slice(-2),
    song:state => {
        return state.song
    },
    player: state => { return player},
    coverImgUrl:state => {
      if(_.isEmpty(state.song.albummid))
        return def.DEFAULT_IMG
      else
        return state.song.singer.picture;
    }
  }
}
