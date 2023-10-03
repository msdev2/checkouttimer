import {
  extension,
  Banner
} from '@shopify/ui-extensions/checkout';

export default extension(
  'purchase.checkout.block.render',
  (root, {shop, settings}) => {
    var staticTitle = "Your cart will expire in {{timer}}";
    var title = (settings.current.timer_title && settings.current.timer_title!="") ?  settings.current.timer_title :  staticTitle
    var type = (settings.current.timer_type && settings.current.timer_type!="") ? settings.current.timer_type : "warning"
    const banner = root.createComponent(Banner, {
      title: title.replace('{{timer}}','0:0'),
      status: type
    });
    let minutes = (settings.current.timer_expire && settings.current.timer_expire!="") ? parseInt(settings.current.timer_expire) : 2

    const calculateEndTime = (timer) => {
      const currentTime = new Date();
      const endTime = new Date(currentTime.getTime() + timer * 60000); // Convert minutes to milliseconds
      return endTime;
    };
    setTimeout(() => {
      console.log("==>",self,shop.storefrontUrl+'cart/clear');
      // self.location = shop.storefrontUrl+'cart/clear';
      fetch(shop.storefrontUrl + 'cart.js')
      .then(response => response.json())
      .then(data => { 
        console.log(data);
       });
      // fetch(shop.storefrontUrl+'cart/clear').then(response => response.json()).then(data => {
      //   console.log(data);
      // });
    }, 3000);
    let countDownDate = calculateEndTime(minutes).getTime();
    var x = setInterval(() => {
      // Get today's date and time
      let now = new Date().getTime();
          
      // Find the distance between now and the count down date
      let distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      let days = Math.floor(distance / (1000 * 60 * 60 * 24));
      let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      let seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      let timein = (days > 0 ? days + "d " : '') + (hours > 0 ? hours + "h " : '') + minutes + "m " + seconds + "s ";
      banner.updateProps({
        title: title.replace('{{timer}}',timein),
      });

      if (distance <= 0) {
        clearInterval(x);
        banner.updateProps({
          title: 'expire',
        });
        fetch(shop.storefrontUrl+'cart/clear').then(response => response.json()).then(data => {
          console.log(data);
        });
        // self.location.replace(shop.storefrontUrl+'cart/clear')
        // console.log(self,shop.storefrontUrl+'cart/clear');
      }
    }, 1000);
    settings.subscribe((newSettings) => {
      minutes = (newSettings.timer_expire && newSettings.timer_expire!= "") ? parseInt(newSettings.timer_expire) : 2
      countDownDate = calculateEndTime(minutes).getTime();
      title = (newSettings.timer_title && newSettings.timer_title != "") ? newSettings.timer_title : staticTitle
      banner.updateProps({
        status: (newSettings.timer_type && newSettings.timer_type != "") ? newSettings.timer_type : "warning",
      });
    });
    root.appendChild(banner);
  },
);
