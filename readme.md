Introducere
===========

Acesta este conținutul site-ului camp.softwareliber.ro.
Branch-ul principal este sincronizat la fiecare 15 minute.

Pentru a face un nou sub-site.

 * faceți dosar cu anul.
 * modificați index.php pentru a redirecta la noul an.
 * faceți un fișier index.md care vi pagina de start pentru noul an.
 * faceți un fișiere constants.php cu informații despre site și cu detalii
   despre meniu.
 * pentru galeria foto, faceți un fișier **poze.md** cu textul introductiv
   pentru galieri și un dosar **foto** în care copiați pozele.

Pentru a genera thumbnailurile, puneți imaginile principale în dosarul „foto”
și asigurați-vă că serverul HTTP are drept de scriere în dosar. Puteți rula
PHP local și apoi să puneți pe server fișierele gata generate fără a mai
fi nevoie de drepturi de scriere pe server.

### Setări pentru nginx

```nginx
location / {
  if (!-f $request_filename){
    set $rule_0 1$rule_0;
  }
  if ($rule_0 = "1"){
    rewrite /. /markdown/markdown.php last;
  }
}
```
