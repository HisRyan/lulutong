function RegQ() {

    //手机号
    this.phone = function (str) {
        //第一位数字为1，第二位数字为3到9,后面还有9位0到9的数字
        var isMatch = /^1[3456789][0-9]{9}$/.test(str);
        return isMatch;
    }

    //座机号
    this.telephone = function (str) {
        //座机号区号三位或者四位,用-连接后面具体的电话,具体的电话第一位为1-9的任一位，后面加4到6位数字
        var isMatch = /^\d{3,4}-[1-9]\d{4,6}$/.test(str);
        return isMatch;
    }

    //邮箱
    this.mail = function (str) {
        //一位以上的字母数字+@+两位以上的字母数字+com or cn or net
        var isMatch = /^[0-9a-z]{1,}@[0-9a-z]{2,}.(com|cn|net|)$/i.test(str);
        return isMatch;
    }

    //身份证
    this.idcard = function (str) {
        //根据身份证规则简化
        var isMatch = /^[1-9][0-9]{2}[0-9]{3}[0-9]{4}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9]{3}(\d|x)$/i.test(str);
        return isMatch;
    }

    //手机号/座机号
    this.cellphone = function (str) {
        //符合手机号或者电话号码即可
        var isMatch = /^(1[3456789][0-9]{9}|\d{3,4}-[1-9]\d{4,6})$/.test(str);
        return isMatch;
    }

    //用户名
    this.username = function (str) {
        //用户名由字母数字和中文和下划线构成构成 不允许数字开头有下划线和其他特殊符号，3-9位字符构成
        var isMatch = /^[a-z\u4e00-\u9fa5][a-z\u4e00-\u9fa50-9]{2,8}$/i.test(str);
        return isMatch;
    }

    //密码
    this.psword = function (str) {
        // 8-16个字符，至少1个大写字母，1个小写字母和1个数字，其他可以是任意字符：
        var isMatch = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[^]{8,16}$/.test(str);
        return isMatch;
    }
    this.psword2 = function (str) {
        // 8-16个字符，至少1个大写字母，1个小写字母和1个数字,不能包含特殊字符（非数字字母）：
        var isMatch = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,16}$/.test(str);
        return isMatch;
    }
    this.psword3 = function (str) {
        // 8-16个字符，至少1个字母，1个数字和1个特殊字符,其他可以是任意字符：
        var isMatch = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W])[^]{8,16}$/.test(str);
        return isMatch;
    }
    this.psword4 = function (str) {
        var isMatch = /^[0-9a-zA-Z]{6}$/.test(str);
        return isMatch;
    }

    //邮编
    this.postcode = function (str) {
        //6位数字构成
        var isMath = /^[0-9]{6}$/.test(str);
        return isMath;
    }

    //QQ
    this.txqq = function (str) {
        //5到12位数字构成

        var isMath = /^[0-9]{8}/.test(str);
        return isMath;
    }

}