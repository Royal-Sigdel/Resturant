<template>
    <div class="Home">
        <form class="form-group" @submit.prevent="spin">
            <div class="vld-parent">
                <loading :active.sync="isLoading" 
                    :can-cancel="true" 
                    :on-cancel="onCancel"
                    :is-full-page="fullPage"></loading>
                <label for="validationCustom01">Amount</label>
                <input type="number" class="form-control col-md-4" id="validationCustom01" v-model="amount" required>
                <br>
                <button type="submit" class="btn btn-primary col-md-4">GenerateQR</button>
            </div>
        </form>
        <br>
        <br>
        <div v-if="QrRequestError">
            <p>Error while generating QR</p>
        </div>
        <div class="center" v-if="QrData">
            <generate-qr :datas='qrdata()'></generate-qr>
        </div>
    </div>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import axios from 'axios';
    export default {
        data() {
            return {
                isLoading: false,
                fullPage: true,
                amount: 100,
                QrData: null,
                CompletionMessage: null,
                QrRequestError: null,
            };
        },
        components: {
            Loading
        },
        methods: {
            spin() {
                this.isLoading = true;
                this.QrRequestError = false;
                let amount = {
                    amt:this.amount
                };
                /*console.log(amount);
                axios({
                    method: 'post',
                    url: '/api/order/qrrequest',
                    headers: {}, 
                    data: amount
                })*/
                 axios.post('/api/order/qrrequest',amount)
                .then(response =>{
                    console.log('response',response.data);
                    this.QrData = response.data.qrMessage;
                    this.CompletionMessage = response.data;
                    console.log(CompletionMessage);
                    this.isLoading = false;
                }).catch(err=>{
                    this.loading = false;
                    this.QrRequestError = true;
                });
            },
            qrdata(){
                let data = this.QrData;
                console.log(data);
                return data;
            },
            onCancel() {
              console.log('User cancelled the loader.')
            }
        }
    }
</script>
<style scoped>
.home {
  width: 1000px;
  margin: auto;
  height: 500px;
  text-align: left;
}
form {
  width: 100%;
  max-width: 500px;
  margin: auto;
  /* important if you do not want fullscreen loader */
  position: relative;
}
.label {
  display: block;
  width: 100%;
  margin-bottom: 10px;
}
.input__field {
  margin-bottom: 10px;
  height: 40px;
  border: 1px solid #e4e4e4;
  border-radius: 5px;
  padding-left: 10px;
  width: 250px;
}
.center {
  margin: auto;
  width: 40%;
  padding: 10px;
  margin-right: auto;
  margin-left: auto;
  text-align: center;
}
</style>