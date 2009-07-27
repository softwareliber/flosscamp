$(function() {
        $('#corp form').submit(function() {

                var inputs = [];
                ok=1;
                $(':input', this).each(function() {
                        if(this.value == "") ok=0;
                })
                if(ok == 0) {
                        alert("Te rugăm să completezi toate câmpurile!");
                        ok =1;
                }
                else {
                        $("#corp form").fadeOut("slow").css("visibility", "hidden").after('<p class="mesaj"><img src="/img/loading.gif" alt="Se încarcă..." />O secundă, se trimite...</p>');

                        $(':input', this).each(function() {
                                inputs.push(this.name + '=' + escape(this.value));
                        })

                        jQuery.ajax({
                                data: inputs.join('&'),
                                url: this.action,
                                timeout: 2000,
                                error: function() {
                                        console.log("Failed to submit");
                                },
                                success: function(r) {
                                $("#corp .mesaj").fadeOut("slow").after("<p class=\"mesaj\">" + r + "</p>");
                                }
                        })
                }
                return false;
        })
        })

