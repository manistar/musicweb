var payBtn = document.getElementById("payBtn");
var payment_info = {
    public_key: "FLWPUBK_TEST-9b9efaabfbb3b031e6a9fba2f9dafb60-X",
    tx_ref: "",
    amount: 0,
    currency: "NGN",
    payment_options: "card, account, banktransfer, ussd",
    redirect_url: "payment.php",
    meta: {
        consumer_id: "",
    },
    customer: {
        email: "",
        phone_number: "",
        name: "",
    },
    customizations: {
        title: "",
        description: "",
        logo: "https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg",
    },
};


payBtn.addEventListener("click", function(e){
    // getpayment info through ajax
    // data = { page: what, what: what, start: start };
    request = $.ajax({
      type: "POST",
      url: "passer",
      data: {newpayment: ""},
    });
  
    request.done(function (response) {
        if(response) {
           var data = JSON.parse(response);
           if(data.status == "error") {

           }else{
            payment_info["tx_ref"]=data.reference;
            payment_info["amount"]=data.price;
            payment_info["meta"]["consumer_id"]=data.userID;
            payment_info["customer"]["email"]=data.email;
            payment_info["customer"]["phone_number"]=data.phone_number;
            payment_info["customer"]["name"]=data.name;
            payment_info["customizations"]["title"]=data.title;
            payment_info["customizations"]["description"]=data.description;
            FlutterwaveCheckout(payment_info);
           }
        }
    });
});

