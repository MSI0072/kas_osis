<script>
    fetch("https://api.apispreadsheets.com/data/9918/").then(res => {
        if (res.status === 200) {
            // SUCCESS
            res.json().then(data => {
                let a = "";
                data.data.forEach(element => {
                    a += element.nominal + ",";
                })
                d = json_encode([a]);
                var f = d.reduce(myFunc);
                console.log(f)



                function myFunc(total, num) {
                    return total - num;
                }
            }).catch(err => console.log(err))
        } else {
            // ERROR
        }
    })
</script>