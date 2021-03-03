
    <footer class="site-footer">
        <div class="container">

          


          <div class="row">

            

            <div class="col-lg-4">
              <div class="mb-5">
                <h3 class="footer-heading mb-4">Sobre</h3>
                <p>AAFP - Associação Académica Fernando Pessoa é uma organização académica sem fins lucrativos localizada na UFP.</p>
              </div>
            </div>


            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="col-md-12">
                  <h3 class="footer-heading mb-4">Segue-nos</h3>
                  <div>
                    <a href="https://www.facebook.com/aafp.oficial" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  </div>
                </div>
            </div>


              <div class="col-lg-4">
                <div>
                  <img src="/images/aafp.png" alt="aafp-logo" border="0" width=250>
                </div>
              </div>

              

          </div>
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <p>
              
              Copyright &copy;<script data-cfasync="false" src="{{asset('/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="icon-heart text-danger" aria-hidden="true"></i> by Capela and Rolotes
              
              </p>
            </div>

          </div>
        </div>
      </footer>

    </div>

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/input-file-preview.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/mediaelement-and-player.min.js')}}"></script>
    <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script src="{{asset('js/circleaudioplayer.js')}}"></script>
    
    @if(!empty(session('message')))
    <script> 
      class MessageBox {
    constructor(id, option) {
      this.id = id;
      this.option = option;
    }
    
    show(msg, label = "FECHAR", callback = null) {
      if (this.id === null || typeof this.id === "undefined") {
        // if the ID is not set or if the ID is undefined
        
        throw "Please set the 'ID' of the message box container.";
      }
      
      if (msg === "" || typeof msg === "undefined" || msg === null) {
        // If the 'msg' parameter is not set, throw an error
        
        throw "The 'msg' parameter is empty.";
      }
      
      if (typeof label === "undefined" || label === null) {
        // Of the label is undefined, or if it is null
        
        label = "FECHAR";
      }
      
      let option = this.option;
  
      let msgboxArea = document.querySelector(this.id);
      let msgboxBox = document.createElement("DIV");
      let msgboxContent = document.createElement("DIV");
      let msgboxClose = document.createElement("A");
      
      if (msgboxArea === null) {
        // If there is no Message Box container found.
        
        throw "The Message Box container is not found.";
      }
  
      // Content area of the message box
      msgboxContent.classList.add("msgbox-content");
      msgboxContent.innerText = msg;
      
      // Close burtton of the message box
      msgboxClose.classList.add("msgbox-close");
      msgboxClose.setAttribute("href", "#");
      msgboxClose.innerText = label;
      
      // Container of the Message Box element
      msgboxBox.classList.add("msgbox-box");
      msgboxBox.appendChild(msgboxContent);
  
      if (option.hideCloseButton === false
          || typeof option.hideCloseButton === "undefined") {
        // If the hideCloseButton flag is false, or if it is undefined
        
        // Append the close button to the container
        msgboxBox.appendChild(msgboxClose);
      }
  
      msgboxArea.appendChild(msgboxBox);
  
      msgboxClose.addEventListener("click", (evt) => {
        evt.preventDefault();
        
        if (msgboxBox.classList.contains("msgbox-box-hide")) {
          // If the message box already have 'msgbox-box-hide' class
          // This is to avoid the appearance of exception if the close
          // button is clicked multiple times or clicked while hiding.
          
          return;
        }
  
        this.hide(msgboxBox, callback);
      });
  
      if (option.closeTime > 0) {
        this.msgboxTimeout = setTimeout(() => {
          this.hide(msgboxBox, callback);
        }, option.closeTime);
      }
    }
    
    hide(msgboxBox, callback) {
      if (msgboxBox !== null) {
        // If the Message Box is not yet closed
  
        msgboxBox.classList.add("msgbox-box-hide");
      }
      
      msgboxBox.addEventListener("transitionend", () => {
        if (msgboxBox !== null) {
          // If the Message Box is not yet closed
  
          msgboxBox.parentNode.removeChild(msgboxBox);
  
          clearTimeout(this.msgboxTimeout);
          
          if (callback !== null) {
            // If the callback parameter is not null
            callback();
          }
        }
      });
    }
  }
      let msgboxbox = new MessageBox("#msgbox-area", {
      closeTime: 10000,
      hideCloseButton: false,
      hideCloseButton: true
      });
      var msg = {!! json_encode(session('message')) !!};
      msgboxbox.show(msg)
      </script>
    @endif
    


    <script src="{{asset('js/main.js')}}"></script>
