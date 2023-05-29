import axios from 'axios';

export default {
    mounted() {
        console.log('mounted1');
      },
      unmounted() {
        console.log('unmounted1');
      },
  methods: {
    async $callAPI(url, method, data) {
      return (await axios({
        method: method,
        url,
        data
      }).catch(e => {
        console.log(e);
      })).data;
    }
  }
}