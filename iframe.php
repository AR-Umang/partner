<iframe src="https://app-test.thimble.com/home?brokerid={your_broker_id}" border="0" frameborder="0" marginwidth="0" marginheight="0" allow="geolocation *;" style="height:700px;width:400px;max-width:100%;max-height:100%;"></iframe>
<button id="trialBtn">click me</button>

<script>
    let elm = document.querySelector("iframe");
    let elm1 = elm.contentWindow.document;
    // let elm2 = elm1;
    console.log(elm1)
</script>