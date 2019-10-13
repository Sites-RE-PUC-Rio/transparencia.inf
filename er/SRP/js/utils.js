    function isEmpty(element)
    {
        return element == null || element.value == null || element.value.match(/^\s*$/);
    }

    function canSubmit()
    {
        var canSubmit = true ;

        for (var i = 0; i < arguments.length; i++)
        {
            var element = arguments[i];
            element = document.getElementById(element);
            if (isEmpty(element))
            {
                canSubmit = false ;
                Element.setStyle(element.id, {backgroundColor:'#F7CACB'}) ;
            }
            else
            {
                Element.setStyle(element.id, {backgroundColor:'#FFFFFF'}) ;
            }
        }

        if (!canSubmit)
        {
            var error = document.getElementById('error') ;
            if (null != error)
                Element.setStyle(error, {display:''}) ;
        }

        return canSubmit ;
    }
