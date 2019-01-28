<template>
<div class="w3-margin-bottom">
    <div class="w3-card-4 w3-margin-bottom">
        <div class="w3-container w3-green">
          <h3>Configure your product here</h3>
        </div>

        <div class="w3-container">
          <p>
            <label>Format</label>
             <select class="w3-select" name="option" @change="getQuantityPrices()" v-model="formatID">
                <option :value="0" disabled selected>Choose your paper format</option>
                <option v-for="paperFormat in paperFormats" :value="paperFormat.id">
                    {{ paperFormat.width }} x {{ paperFormat.height }} {{ paperFormat.unit }}
                </option>
            </select>
          </p>

          <p>
            <label>Pages</label>
               <select class="w3-select" name="option" @change="getQuantityPrices()" v-model="pageID">
                <option :value="0" disabled selected>Choose your page</option>
                <option v-for="page in pages" :value="page.id">{{ page.description }}</option>
               </select>
          </p>

          <p>
            <label>Paper Type</label>
           <select class="w3-select" name="option" @change="getQuantityPrices()" v-model="typeID">
            <option :value="0" disabled selected>Choose your paper type</option>
            <option v-for="paperType in paperTypes" :value="paperType.id">{{ paperType.type }}</option>
          </select>
          </p>
        </div>
    </div>
    <div class="w3-responsive">
        <table class="w3-table w3-hoverable w3-border w3-bordered w3-centered w3-card" id="productTable">
            <thead class="w3-blue">
                <tr>
                    <th>Quantity</th>
                    <th v-for="deliveryDate in deliveryDates">{{ deliveryDate }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products">
                    <td>{{ product.quantity }}</td>
                    <td v-for="(deliveryDate, index) in deliveryDates" v-if="index === 0">
                        <input type="radio" name="cartData" v-model="cartData" :value="product.product_configuration.id+'_'+product.product_configuration.price+'_'+product.price_per_piece+'_'+product.quantity+'_1_'+product.total_one_day+'_'+(getVat(product.total_one_day))+'_9_'+(getTotal(product.total_one_day, getVat(product.total_one_day), 10))+'_'+formatDate(deliveryDate)+'_'+product.product_configuration.name" class="w3-radio" /> 
                        
                        {{ product.total_one_day | toCurrency }}
                    </td>
                    <td v-for="(deliveryDate, index) in deliveryDates" v-if="index === 1">
                        <input type="radio" name="cartData" v-model="cartData" :value="product.product_configuration.id+'_'+product.product_configuration.price+'_'+product.price_per_piece+'_'+product.quantity+'_2_'+product.total_two_days+'_'+getVat(product.total_two_days)+'_9_'+(getTotal(product.total_two_days, getVat(product.total_two_days), 10))+'_'+formatDate(deliveryDate)+'_'+product.product_configuration.name" class="w3-radio" /> 
                        
                        {{ product.total_two_days | toCurrency }}
                    </td>
                    <td v-for="(deliveryDate, index) in deliveryDates" v-if="index === 2">
                        <input type="radio" name="cartData" v-model="cartData" :value="product.product_configuration.id+'_'+product.product_configuration.price+'_'+product.price_per_piece+'_'+product.quantity+'_3_'+product.total_three_days+'_'+getVat(product.total_three_days)+'_9_'+(getTotal(product.total_three_days, getVat(product.total_three_days), 10))+'_'+formatDate(deliveryDate)+'_'+product.product_configuration.name" class="w3-radio" />
                        
                        {{ product.total_three_days | toCurrency}}
                    </td>
                    <td v-for="(deliveryDate, index) in deliveryDates" v-if="index === 3">
                        <input type="radio" name="cartData" v-model="cartData" :value="product.product_configuration.id+'_'+product.product_configuration.price+'_'+product.price_per_piece+'_'+product.quantity+'_4_'+product.base_price+'_'+getVat(product.base_price)+'_9_'+(getTotal(product.base_price, getVat(product.base_price), 10))+'_'+formatDate(deliveryDate)+'_'+product.product_configuration.name" class="w3-radio" />
                        
                        {{ product.base_price | toCurrency }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="w3-container w3-panel"  v-if="cartData.length">
      <div class="w3-card-4 w3-quarter" style="float:none; margin: 0 auto;">
        <div class="w3-container w3-brown">
          <h3>Details</h3>
        </div>
        <div class="w3-container">
          <p><strong>Selected Configuration</strong> <span class="w3-right">{{ configName }}</span></p>
          <p><strong>Delivery Date</strong> <span class="w3-right">{{ deliveryDate }}</span></p>
          <p><strong>Production Days</strong> <span class="w3-right">{{ productionDays }} days</span></p>
          <p><strong>Config Price</strong> <span class="w3-right">{{ configPrice | toCurrency }}</span></p>
          <p><strong>Price Per Piece</strong> <span class="w3-right">{{ pricePerPiece | toCurrency }}</span></p>
          <p><strong>Quantity</strong> <span class="w3-right">{{ quantity }}</span></p>
          <p><strong>Subtotal</strong> <span class="w3-right">{{ subtotal | toCurrency }}</span></p>
          <p><strong>VAT</strong> <span class="w3-right">{{ vat | toCurrency }}</span></p>
          <p><strong>Shipping Fee</strong> <span class="w3-right">{{ shippingFee | toCurrency }}</span></p>
          <h2 class="w3-red">TOTAL: {{ total | toCurrency }}</h2>
        </div>
      </div>
    </div>
    
    <div class="w3-row w3-margin-top" v-if="cartData.length">
        <!--Add to Card Sign Up-->
        <div class="w3-container w3-half">
            <div class="w3-card">
                <div class="w3-container w3-purple">
                  <h3>Sign Up + Add to Cart</h3>
                </div>

                <div class="w3-container">
                  <p>
                    <label>Email</label>
                    <input type="text" v-model="registerEmail" class="w3-input" />
                    <span v-if="registerEmail.length < 5" class="w3-alert w3-red">
                        Email field must be at least 6 characters
                    </span>
                  </p>

                  <p>
                    <label>Password</label>
                    <input type="password" v-model="registerPassword" class="w3-input" />
                    <span v-if="registerPassword.length < 5" class="w3-alert w3-red">
                        Password field must be at least 6 characters
                    </span>
                  </p>

                  <p>
                    <label>Confirm Password</label>
                    <input type="password" v-model="confirmPassword" class="w3-input" />
                    <span v-if="registerPassword !== confirmPassword" class="w3-alert w3-red">
                        Password don't match
                    </span>
                  </p>
                </div>

                <div class="w3-center">
                  <button @click="signUpCart" class="w3-blue w3-button w3-margin-bottom w3-round-large" v-if="registerEmail.length > 5 && registerPassword === confirmPassword && registerPassword.length > 5">
                    Sign Up + Add To Cart
                  </button>
                </div>
            </div>
        </div>

        <!--Add to Card Log In-->
        <div class="w3-container w3-half">
            <div class="w3-card">
                <div class="w3-container w3-purple">
                  <h3>Log In + Add to Cart</h3>
                </div>

                <div class="w3-container">
                  <p>
                    <label>Email</label>
                    <input type="text" v-model="loginEmail" class="w3-input" />
                  </p>

                  <p>
                    <label>Password</label>
                    <input type="password" v-model="loginPassword" class="w3-input" />
                  </p>
                </div>

                <div class="w3-center">
                  <button @click="logInCart" class="w3-blue w3-button w3-margin-bottom w3-round-large">
                    Log In + Add To Cart
                  </button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                deliveryDates: [],
                paperFormats: [],
                pages: [],
                paperTypes: [],
                products: [],
                formatID: 0,
                pageID: 0,
                typeID: 0,
                cartData: {},
                configID: 0,
                registerEmail: '',
                registerPassword: '',
                confirmPassword: '',
                requireLengthInfo: '',
                loginEmail: '',
                loginPassword: '',
                configName: '',
                configPrice: 0,
                pricePerPiece: 0,
                quantity: 0,
                productionDays: 0,
                subtotal: 0,
                vat: 0,
                shippingFee: 0,
                total: 0,
                deliveryDate: ''
            }
        },
        mounted() {
            this.loadDeliveryDates();

            axios.get('/api/v1/paper_formats').then(response => this.paperFormats = response.data.data);

            axios.get('/api/v1/pages').then(response => this.pages = response.data.data);

            axios.get('/api/v1/paper_types').then(response => this.paperTypes = response.data.data);
        },
        methods: {
            loadDeliveryDates: function() {
                var numDeliveryDates = 0;
                var dateCounter = 0;

                while (numDeliveryDates < 4) { //don't stop until we got 4 dates for table column
                    var dateToCheck = moment().add(dateCounter, 'days').format('MMMM DD, YYYY');

                    if (moment(dateToCheck, 'MMMM DD, YYYY').isBusinessDay()) {
                        console.log(dateToCheck);
                        this.deliveryDates.push(dateToCheck);
                        numDeliveryDates++;
                    }

                    dateCounter++;
                }      
            },
            getQuantityPrices: function(){
                //   alert('page: '+this.pageID+' type: '+this.typeID);
                axios.get('/api/v1/product_configurations/filter/paper_format_id/'+this.formatID+'/page_id/'+this.pageID+'/paper_type_id/'+this.typeID)
                .then((response) => {
                    this.configID = response.data.data[0].id;


                    axios.get('/api/v1/product_quantity_prices/filter/product_configuration_id/'+this.configID)
                    .then(response => this.products = response.data.data);
                    /*.then((response) => {
                        this.products = response.data.data;
                    });*/
                });
            },
            getVat: function (subtotal) {
                return (subtotal * 0.07).toFixed(2);
            },
            getTotal: function (subtotal, vat, shippingFee) {
                return (parseFloat(subtotal) + parseFloat(vat) + parseInt(shippingFee)).toFixed(2);
            },
            formatDate: function(stringDate){
                return moment(stringDate).format("YYYY-MM-DD");
            },
            signUpCart: function(){
                axios.post('/api/v1/register', {'email': this.registerEmail, 'password': this.registerPassword})
                .then((response) => {
                    var userID = response.data.id;

                    var carts = this.cartData.split("_");

                    var cartObject = {
                        'user_id': userID,
                        'product_configuration_id': carts[0],
                        'configuration_price': carts[1],
                        'price_per_piece': carts[2],
                        'quantity': carts[3],
                        'production_days': carts[4],
                        'subtotal': carts[5],
                        'vat': carts[6],
                        'shipping_fee': carts[7],
                        'total': carts[8],
                        'delivery_date': carts[9]
                    };

                    this.addToCart(cartObject);
                })
                .catch((error) => {
                    var text = [];

                    Object.entries(error.response.data.errors).forEach(
                      ([key, value]) => text.push(value)
                    );

                    alert(text.toString().replace(/,/g,"\n"));
                });
            },
            logInCart: function(){
                axios.post('api/v1/login', {
                    'email': this.loginEmail,
                    'password': this.loginPassword
                }).then((response) => {
                    var userID = response.data.id;

                    var carts = this.cartData.split("_");

                    var cartObject = {
                        'user_id': userID,
                        'product_configuration_id': carts[0],
                        'configuration_price': carts[1],
                        'price_per_piece': carts[2],
                        'quantity': carts[3],
                        'production_days': carts[4],
                        'subtotal': carts[5],
                        'vat': carts[6],
                        'shipping_fee': carts[7],
                        'total': carts[8],
                        'delivery_date': carts[9]
                    };

                    this.addToCart(cartObject);

                    alert("Added To Cart")
                })
                .catch((error) => {
                    var text = [];

                    Object.entries(error.response.data.errors).forEach(
                      ([key, value]) => text.push(value)
                    );

                    alert(text.toString().replace(/,/g,"\n"));
                });
            },
            addToCart: function(cartObjectData){
                axios.post('api/v1/carts', cartObjectData)
                .then((response) => {
                    alert("Added To Cart");
                })
                .catch((error) => {
                    var text = [];

                    Object.entries(error.response.data.errors).forEach(
                      ([key, value]) => text.push(value)
                    );

                    alert(text.toString().replace(/,/g,"\n"));
                });
            }
        },
        watch: {
            cartData: function() {
                var carts = this.cartData.split("_");

                this.configName = carts[10];
                this.configPrice = parseFloat(carts[1]);
                this.pricePerPiece = parseFloat(carts[2]);
                this.quantity = carts[3];
                this.productionDays = carts[4];
                this.subtotal = parseFloat(carts[5]);
                this.vat = parseFloat(carts[6]);
                this.shippingFee = parseFloat(carts[7]);
                this.total = parseFloat(carts[8]);
                this.deliveryDate = moment(carts[9]).format("MMMM DD, YYYY");
            }
        }
    }
</script>
