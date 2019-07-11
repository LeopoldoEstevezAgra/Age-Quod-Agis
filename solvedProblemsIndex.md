# Solutions Cheatsheet

###  *Quick Intoduction*

Here im going to add a little summary of all errors that I'm getting and how I
solve them in so I can refference this documentation in the future when new 
erros appear.

* #### Ajax executing as it should be only the first call

    Error code 

    ```js
       jQuery('#day_task_ajax').click(function(){
           // Ajax request
       }
    ```
    In this code the request is only executed once, then the page is reloaded

    Correct code 

    ```js
       jQuery(document).on('click','#day_task_ajax',function(e){
           // Ajax request
       }
    ```

    In this code que are making direct refference to the document element itself 
    and adding to it the event , not the other way around

    Time cosumed in this bug : 2 Hours 




