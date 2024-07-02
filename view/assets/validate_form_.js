

function Validator(formSelector,callback) {
    function getParent(element, selector) {
        while (element.parentElement) {
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement
        }
    }
    var formRules = {};
    var validatorRules = {
        required: function (value) {
            return value ? undefined : "Vui lòng nhập trường này !";

        },
        space: function (value) {
            var sp = /\s/
            return !sp.test(value) ? undefined : "Không được chứa dấu cách !";

        },
        


        email: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
            return regex.test(value) ? undefined : "Trường này phải là email !";


        },
        min: function (min) {
            return function (value) {
                return value.length >= min ? undefined : `Mật khẩu tối thiểu ${min} kí tự !`;
            }

        },
        confirm_pass: function (value) {
            
            return value == callback() ? undefined : "Không trùng mật khẩu";

        }
    }
    var formElement = document.querySelector(formSelector);
    if (formElement) {
        var inputs = formElement.querySelectorAll('[name][rules]');
        for (var input of inputs) {

            var rules = input.getAttribute('rules').split('|');
            for (var rule of rules) {
                var ruleInfo;
                var ruleHasValue = rule.includes(':');
                if (ruleHasValue) {
                    ruleInfo = rule.split(':');

                    rule = ruleInfo[0];

                }
                // lặp qua từng rule và nếu chưa key name của input chưa tồn tại trong mảng formRules
                // thì tạo 1 mảng có 1 rule đầu tiên và tiếp theo đó kiểm tra nếu tồn tại rồi thì add vào mảng đó
                // ví dụ như [required,email] của rules email thì lần đầu tiên rơi vào else nó tạo add 1 mảng có key là required : required()
                // sau đó nó lặp đến email thì rơi vào if mảng required.push(email())
                var ruleFunc = validatorRules[rule];
                if (ruleHasValue) {
                    ruleFunc = ruleFunc(ruleInfo[1])
                }
                if (Array.isArray(formRules[input.name])) {
                    formRules[input.name].push(ruleFunc)
                }
                else {
                    formRules[input.name] = [ruleFunc];
                }

                // console.log(rule);
            }



            // lắng nghe sự kiện validate
            input.onblur = handleValidate;
            input.oninput = handleClear;
        }
        // HÀM VALIDATE
        function handleValidate(event) {
            var rules = formRules[event.target.name];
            var errorMes;
            for (let i = 0; i < rules.length; i++) {
                errorMes = rules[i](event.target.value);
                if (errorMes) {

                    break;
                }
            }

            // nếu có lỗi thì hiển thị ra thẻ span
            if (errorMes) {
                var formGroup = getParent(event.target, '.form-group');
                if (formGroup) {
                    formGroup.classList.add('color')
                    var formMessage = formGroup.querySelector('.form-message');
                    if (formMessage) {
                        formMessage.innerText = errorMes;
                    }
                }
            }
            return !errorMes;

        }
        // 
        function handleClear(event) {
            var formGroup = getParent(event.target, '.form-group');
            if (formGroup) {
                formGroup.classList.remove('color')
                var formMessage = formGroup.querySelector('.form-message');
                if (formMessage) {
                    formMessage.innerText = '';
                }
            }
        }

        // xử lý sự kiện submit
        formElement.onsubmit = function (event) {

            event.preventDefault();
            var inputs = formElement.querySelectorAll('[name][rules]');
            var isValid = true;
            for (var input of inputs) {
                if (!handleValidate({ target: input })) {
                    isValid = false;
                }
            }
            if (isValid) {

                formElement.submit();

            }
        }
    }





}


function Validator1(formSelector,callback) {
    function getParent(element, selector) {
        while (element.parentElement) {
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement
        }
    }
    var formRules = {};
    var validatorRules = {
        required: function (value) {
            return value ? undefined : "Vui lòng nhập trường này !";

        },
        space: function (value) {
            var sp = /\s/
            return !sp.test(value) ? undefined : "Không được chứa dấu cách !";

        },
        


        email: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
            return regex.test(value) ? undefined : "Trường này phải là email !";


        },
        min: function (min) {
            return function (value) {
                return value.length >= min ? undefined : `Mật khẩu tối thiểu ${min} kí tự !`;
            }

        },
        confirm_pass: function (value) {
            
            return value == callback() ? undefined : "Không trùng mật khẩu";

        }

    }
    var formElement = document.querySelector(formSelector);
    if (formElement) {
        var inputs = formElement.querySelectorAll('[name][rules]');
        for (var input of inputs) {

            var rules = input.getAttribute('rules').split('|');
            for (var rule of rules) {
                var ruleInfo;
                var ruleHasValue = rule.includes(':');
                if (ruleHasValue) {
                    ruleInfo = rule.split(':');

                    rule = ruleInfo[0];

                }
                // lặp qua từng rule và nếu chưa key name của input chưa tồn tại trong mảng formRules
                // thì tạo 1 mảng có 1 rule đầu tiên và tiếp theo đó kiểm tra nếu tồn tại rồi thì add vào mảng đó
                // ví dụ như [required,email] của rules email thì lần đầu tiên rơi vào else nó tạo add 1 mảng có key là required : required()
                // sau đó nó lặp đến email thì rơi vào if mảng required.push(email())
                var ruleFunc = validatorRules[rule];
                if (ruleHasValue) {
                    ruleFunc = ruleFunc(ruleInfo[1])
                }
                if (Array.isArray(formRules[input.name])) {
                    formRules[input.name].push(ruleFunc)
                }
                else {
                    formRules[input.name] = [ruleFunc];
                }

                // console.log(rule);
            }



            // lắng nghe sự kiện validate
            input.onblur = handleValidate;
            input.oninput = handleClear;
        }
        // HÀM VALIDATE
        function handleValidate(event) {
          
            var rules = formRules[event.target.name];
            var errorMes;
                console.log(rules);
                console.log("name",event.target.name);
            for (let i = 0; i < rules.length; i++) {
                errorMes = rules[i](event.target.value);
                if (errorMes) {

                    break;
                }
            }

            // nếu có lỗi thì hiển thị ra thẻ span
            if (errorMes) {
                var formGroup = getParent(event.target, '.form-group');
                console.log(formRules[event.target.name]);
                if (formGroup) {
                    formGroup.classList.add('color')
                    var formMessage = formGroup.querySelector('.form-message');
                    if (formMessage) {
                        formMessage.innerText = errorMes;
                        
                    }
                }
            }
            return !errorMes;

        }
        // 
        function handleClear(event) {
            var formGroup = getParent(event.target, '.form-group');
            if (formGroup) {
                formGroup.classList.remove('color')
                var formMessage = formGroup.querySelector('.form-message');
                if (formMessage) {
                    formMessage.innerText = '';
                }
            }
        }
        formElement.onsubmit = function (event) {

            event.preventDefault();
            var inputs = document.querySelectorAll('[name][rules]');
            var isValid = true;
            for (var input of inputs) {
                if (!handleValidate({ target: input })) {
                    isValid = false;
                }
            }
            if (isValid) {

                formElement.submit();

            }
        }

    }


    // xử lý sự kiện submit



}

function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };

    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    var re = /(-?\d+)(\d{3})/;
    while (re.test(s[0])) {
        s[0] = s[0].replace(re, "$1" + sep + "$2");
    }

    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}


