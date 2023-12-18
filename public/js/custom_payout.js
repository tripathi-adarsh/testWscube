var APP_URL = window.location.origin; // get base url of website

console.log(APP_URL);
 /*check checkedbox for button disabled and enable */
    function checkBoxButton(value){
        console.log(value);
        if (value=='online_check') {
            if (document.getElementById(value).checked) {
                $('#cust-online').attr("disabled", false);            
            }else{
                console.log('uncheck');
                $('#cust-online').attr("disabled", true);
                document.getElementById('cust_all_check').checked = false;
                $('#cust-confim-all').attr("disabled", false);
            }
        }

        if (value=='rc_check') {
            if (document.getElementById(value).checked) {
                $('#cust-rcbook').attr("disabled", false);            
            }else{
                $('#cust-rcbook').attr("disabled", true);
            }
        }

        if (value=='bundle_check') {
            if (document.getElementById(value).checked) {
                $('#cust-bundle').attr("disabled", false);            
            }else{
                $('#cust-bundle').attr("disabled", true);
            }
        }

        if (value=='bulk_check') {
            if (document.getElementById(value).checked) {
                $('#cust-bulk').attr("disabled", false);            
            }else{
                $('#cust-bulk').attr("disabled", true);
            }
        }

        if (value=='cust_all_check') {
            if (document.getElementById(value).checked) {
                $('#cust-confim-all').attr("disabled", false);            
            }else{
                $('#cust-confim-all').attr("disabled", true);
            }
        }

            
    }
    /*End: check checkedbox for button disabled and enable */
    /*check account verify if not verified then send to mail to alib admin  */
     function bankVerify(partner_id){   
        $('#cust_book_confirm').modal('hide');            
        $.ajax({
            url:APP_URL+'/checkbankVerify',
            type: "GET",
            data: {
                'partner_id': partner_id,
                'type':'verify',
            },
            dataType: "json",
            cache: false,
            success: function(result) {
                if (result.data==1) {
                    console.log(result);
                    $('#cust-text').replaceWith('<p class="text-info" id="cust-text"><b>'+result.success+'</br></p>');
                    $('#cust_text_confirm').modal('show');
                }else{
                    
                    $('#cust-text').replaceWith('<p class="text-danger" id="cust-text"><b>'+result.error+'</br></p>');
                    $('#cust_text_confirm').modal('show');
                }
            }
        });
    }
    /*End: check partner bank info */

    /*check partner bank info */
    function checkBankInfo(partner_id){ 
        if ($('input[type=checkbox]:checked').length==0) {
            alert('Please checked atleast one !');
            return false;
        }    
        console.log('check bank info');   
        $.ajax({
            url:APP_URL+'check-partner-bank',
            type: "GET",
            data: {
                'partner_id': partner_id,
            },
            dataType: "json",
            cache: false,
            success: function(result) {
                if (result.data==1) {

                    console.log('check bank info success');  
                    $('#cust_book_confirm').modal('show');
                }else{
                    
                    $('#cust-text').replaceWith('<p class="text-danger" id="cust-text"><b>'+result.error+'</br></p>');
                    $('#cust_text_confirm').modal('show');
                }
            }
        });
    }
    /*End: check partner bank info */
    
    /*when clicked top checked all checkbox */
    document.getElementById('cust_all_check').onclick = function() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    /*when clicked top checked all checkbox */
    // document.getElementById('cust_all_check_btm').onclick = function() {
    //     var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    //     for (var checkbox of checkboxes) {
    //         checkbox.checked = this.checked;
    //     }
    // }

    /*array unique functions */
    function onlyUnique(value, index, self) {
      return self.indexOf(value) === index;
    }

    /*code for rc confirm */
    function AllConfirm(month,year){
        if ($('input[type=checkbox]:checked').length==0) {
            alert('Please checked atleast one !');
            return false;
        }
        var types =[];
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        $("input:checkbox[name=cust_checked]:checked").each(function(){
            types.push($(this).val());
        });
        var types = types.filter(onlyUnique);
        console.log(types);
        // console.log(month,year);
        window.location = 'generate-allpayment?month='+month+'&year='+year+'&types='+types;
    }
