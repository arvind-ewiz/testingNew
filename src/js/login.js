function clearText(input)
    {
       if (input.defaultValue==input.value)
       input.value = ''
    }
    
    function restoreText(input)
    {
    if (input.value=='')
    input.value = input.defaultValue
    }