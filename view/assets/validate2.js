function Validator(options) {
    function parentElementForm(element,selector){
        while(element.parentElement){
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement
        }
    }
    var selectorRules = {};
    function validate(inputElement, rule) {
        var errorMes;
        var formMessage = parentElementForm(inputElement,options.parent).querySelector('.form-message')
        var rules = selectorRules[rule.selector]

        for (var i = 0; i < rules.length; i++) {
            switch(inputElement.type){
                case 'radio':
                    case 'checkbox':
                        // tìm thẻ input dc người dùng checked, nếu k có thì trả về null
                        // không động tới inputElement
                        errorMes = rules[i](formElement.querySelector(rule.selector + ':checked'))
                        
                        break;

                        // các rule khác radio và checkbox
                        default:
                            errorMes = rules[i](inputElement.value)
            }
            if (errorMes) {
                break;
            }
        }
        if (errorMes) {
            formMessage.innerText = errorMes
            parentElementForm(inputElement,options.parent).classList.add('invalid')
        }
        else {
            formMessage.innerText = ''
            parentElementForm(inputElement,options.parent).classList.remove('invalid')
        }
        return !errorMes;
    }
    var formElement = document.querySelector(options.form)
    if (formElement) {

        formElement.onsubmit = function (e) {
            e.preventDefault();
            var isFormValid = true;
            // bởi vì checkbox và radio case không dùng đến inputElement nên không phải dùng All
            // lặp qua từng rule và validate
            options.rules.forEach(function (rule) {
                var inputElement = formElement.querySelector(rule.selector);
                var isValid = validate(inputElement, rule);
                if (!isValid) {
                    isFormValid = false;
                }
            })
            
            

            if (isFormValid) {
                if (typeof options.onSubmit === "function") {
                    var enableInput = formElement.querySelectorAll('[name]');
                    var resuit = Array.from(enableInput).reduce(function (values, input) {
                        switch(input.type){
                            case 'radio':
                                // lấy value của thẻ input đang bị checked và gán nó vào values[input.name]
                                // 
                                values[input.name] = formElement.querySelector(`input[name="${input.name}"]:checked`).value
                                break;
                                case 'checkbox':
                                    // nếu được checked thì mới thực hiện code ko thì return

                                    if(!input.matches(':checked')) return values; 
                                    // nếu values[input.name] được check đầu tiên và không phải là array thì gán = 1 array
                                    if(!Array.isArray(values[input.name])){
                                        values[input.name] = [];
                                    }
                                    // các input tiếp theo vì trùng name cho nên sẽ luôn chỉ tạo 1 array đầu thôi
                                    // sau đó push các value tiếp theo vào
                                    values[input.name].push(input.value);
                                     
                                    break;
            
                                    // các rule khác radio và checkbox
                                    default:
                                        values[input.name] = input.value
                                        
                        }
                       return values
                    }, {})

                    options.onSubmit(resuit)
                }
                else{
                    formElement.submit()
                }
            }

        }
        options.rules.forEach(function (rule) {
            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test)
            }
            else {
                selectorRules[rule.selector] = [rule.test]
            }
            var inputElements = formElement.querySelectorAll(rule.selector);
            Array.from(inputElements).forEach(function(inputElement){
                if (inputElement) {
                    var formMessage = parentElementForm(inputElement,options.parent).querySelector('.form-message')
                    inputElement.onblur = function () {
                        validate(inputElement, rule)
                    }
                    inputElement.oninput = function () {
                        formMessage.innerText = ''
                        parentElementForm(inputElement,options.parent).classList.remove('invalid')
                    }
                }

            })
        });
    }
}

Validator.isRequired = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            return value ? undefined : message || "Vui lòng nhập"
        }
    }
}

Validator.isEmail = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
            return regex.test(value) ? undefined : message || "Trường này phải là email"
        }
    }
}
Validator.isPassword = function (selector, min, message) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min ? undefined : message || `Mật khẩu tối thiểu ${min} kí tự`
        }
    }
}
Validator.isPasswordConfirmation = function (selector, passwordConfirmation, message) {
    return {
        selector: selector,
        test: function (value) {
            return value === passwordConfirmation() ? undefined : message
        }
    }
}











