<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . './classes./product.php';
require_once __DIR__ . './classes./food.php';
require_once __DIR__ . './classes./toys.php';
require_once __DIR__ . './classes./cage.php';
require_once __DIR__ . './traits/partnership.php';

$ecommerce = [];

try{
$singleproduct = new product('Gatto Matto', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUVFRYVFBUYGRgZGRocHBwaGBwYGBocGBgaIxwcHBkcJC4lHx4rHyEZJzgnKy8xNTU3HiQ7QDs0Py40NTEBDAwMEA8QHxISHzQrJCQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0PT00NDQ1NP/AABEIAM0A9gMBIgACEQEDEQH/xAAcAAEAAgMBAQEAAAAAAAAAAAAABAUCAwYHAQj/xABLEAACAQIEAgYGBwUEBwkBAAABAgADEQQSITFBUQUGImFxgRMyYpGhsUJScoKS0fAUorLB4SMzQ3MHJFNlg6OzFWNkdISTwtLxFv/EABkBAQEBAQEBAAAAAAAAAAAAAAACAQMEBf/EACMRAQEAAgICAgIDAQAAAAAAAAABAhEDIRIxQVEEIhNxgWH/2gAMAwEAAhEDEQA/APZoiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiYVKgUXJAHMmwgZRK2v01QXeoD9m7fKV1frbRXZXb8IHxMnyjdOjicTW6822ogAcWfYXtf1RYX5zXX624j6KUxoTYhidNx629o8oad1E8xfrnjLgFqQuVFwmnaYqLXY7kpbkWW9wwMgv12xuVj6SmCM3+GCNiB+8GPeoXnHlDT1yJ5C3XjHBsoqUiTtemPpOqja1/pW5+Rkil19xu9qDDU2ysDa9gLh+fH3XjyhqvVonm1H/AEh1gO3Qpt9lmX55pPw/+kemfXw9Rfssr/PLHlDTu4nN4Xrpg33qFD7aso94uPjLvC4ynUGam6OOasGHwm7YkxETQiIgIiICIiAiIgIiICIiAiJpr1goufIcSeQgbDIVfpBV9UFvDQe/8pCr4lm1bQcF4f1Mq8fXOXT5znc/iKmP2kYrpl2uFYL4b+8ymxVW5uxzHmSWMivVJGm8hYiod5G7b2rWkh3B8JHa363kRqpmmriWXeJBvrU76j5DlbY6baW2I0OlrOjauUhG9XTLa5K+yCdSAR2b6i4B2F4yYq/H8prqvYh13B/L8h5hPqxBP6Sw4BuLWIOw0BA3HiShHgn1ZCeggLg211sNeAW3u185Zhw9O43F++xXtA/hLD7kgU118vkAPlabWKfE0RnYA6+r36EqPPtm32hym1aemltfy0HgBYeXeZqrJeox5sT8LHyIt5ibhrrz/V/GZWsGTX9fr9eck0KQbkZnSUNpJdLC7WEzY1jAn6OvcZ9TDEG63VxxUlT5MNZeUKNh2tJgyBmusbbp8wnWLG0Ppiqg+jUFzbucdr33nU9EddMPWstS9Fzwc3Qnufb32nKVqQ3lTWojNKxyrLjHtIMTyroPrDWwpCkmpS4oTqo5oTt4beG89K6PxyVkWpTYMrbH5gjgRynSZSos0mRESmEREBERAREQERED4ZTdIVSdfd4f1lrXPZPh85RValwQ3lpp4EznnlrpWM2rXxm4/X5WkV8UeNiCPGY45De+xueP8x+viJTYrElQWbQC1z47aDcnQADU30uNZys73HRJrhTqP15DaV9RyL6ee/w4DvMijGvbUZG7Qyk66b313tYkX0+keE1DpMkadoWFidjc2uNNQTcbdo6KN7b/AGxv/bF4ibPSIdD/AF8pEeop4cbczfgo7/Ow21mPohw5253PLvA5aL3R5Q0+1sKN0YHuOnx2mHoqg3Qkd1j8ptRLbG+1u/Ww8ST8ja0MSSO8jbkWsLeNjY89dgLNs0z6OdlzBlYaBhcEXyt/NC/vhAwLDXYjbx/pKvGVCb62BVibfUpuvpW8wAg7hbjIhDjOWYjLfNqdDau7+5Kqny7pcm2ek5KLkt2G3Nuydrn9eclf9nufo28SB8zIXpmUklrAZswuBlylr68AoRhflnO4E3069S+UWzBstgLktYkKVvxK1FGouVy3zKpmeJtb4DBhPXI8Br8ZYo4FreGv5TnkxbG1mBzZMpzaHOCaZDcn7ShjYZxY5WJJyWuTYhrg7aWvc5bEG1iWGQqbWbsHLdDMsUvnrLxb8tN5rfG29UX8BKc4gaEkWIFmYkJvYZ2tmUZuzntdG7LrsW3O9tLG4IUghQ6sdkb6IYjYG6PplyG0zUO0h6xbbb9frumCjzP5zUlYHxINiAe0F3yhtSV1zI3bUgntaTU2J8PEG4IPEHW4PmeecbPbWdX4Sb1R6c/ZsRkY2pVCAwOysdFcfI93hKerWvvpz8jYnw2B5abC0g4tgF146Eag/wD7+uWbZ+rL2/QM+yn6q401sJQdjdigDHmy9lj5kEy3ndyfYiICIiAiIgIiIGuqt1I7py/SQAGn0jb8h57Tq5z/AFgwhykr4juPH9flOXLjubVjdOUxOLGmYE8zxt2babZiWQeOb6sj4gC6qSMxJOmmWwOYg7iwuC2/LnMq65Wvyd2/9sVWX94/CVi+v2joCiHe+SmnpauvMsw905Sur5icICt2AykDs2sCl+wthrkLahd247mQcThiGOtte02nZ4E8i52HBQCBaxm+rinPbJ1RFaw/2lYtk/DTFxyJEekylwQCKdkHI1GvmY87Wf3CLl9kiEqm4AGUkGwP+GnFj7Zv8bc7bKb7WuAQcvNU4t4n+ffJLAXcEaKoz82Zvonu7R/eM+5BmPFrIPvPqB5AsfEjlJ3G6rTn4DQk5R3EjtH7q2HvkZ8QbM6j6xUfZGSmPxM58pKalfUW1uq+bdpj5j5zTWCoFA2VGfypMMl+/MbzZo7QMSgYOg1FqWHU/bYGof4SZB6RcsTa/bqY9vJMPkHyMmVewma+qUDX8XqK4XzGZfwz7icOqZrXtSSnvv8A61VLMD8ROuPTnkjVagzZiNL3a/FcyFv3MTUikzEqrMQW/s2b6rk5Va/s4ikH/wCIec24iktnDW0Z0buUV6dF/wB3J8JscICQ5tdrH2bYhqTt3kOyP5TpUxiuIBBZ1ORgzMo+pUIGJpjvSraovIk2klazahrM2ocn1GdRlzkfUrIVRx9cA7i41KLnINHIxKjjlxGEN18mQ68y3dMvTKoZ6YuFp0sSiHjRc5K9EnkhzWP2zuZFkWkCoSSNwc183auQupYbEsllcbMAHuCLzNamVCDqiKACe0fRPc5KnF09Yq2/ZcesBfW6lWKI3aV1po3Eh1NXA1OVx26Z5qwBmK49Vy1VW6ZVqhNbehrvkxFHwWuoZfq3vMujtJdSCQzAEFAzMbhS3907kalG0XODfbXQNMhYkWBuS65dMwqJ69Fh6ue12Q7NqpFjpoChL03OZKFT0Dn6+ExVyhP2TlYci4kIVHHpFZu2KdyeVfCVCucd5RT+KTa2RIq1wNm4XDDUWsCCL72VlYX1KF0a9pWVq178LHbgLaWHhqPBV5SV0k4LnLsTmA5BxnC+AFVl8AJcdRerzYrEBnX+ypkM5OzEElU7ydz3X5iTrd031Hq/VPBmlg8OjCzCmCw5M3aYe8mXET7PTOnAiImhERAREQERED4TKPpnpIKhsRbv49/hLHH1bLbnv4TiOs2I0IB+d/LnOWeXwrGfKE3SNKobMQjba2CsLMpt9U2ZtDa5t4SJiMIys3Z3L+F6mHA0++jDzE5DrLXIUkf198quiOt+Jw/ZLekQfRc6rqCMj7rqBpqNNpEx36dN6doF7a8Qa1E+K+hpZf8A5j3yLh7siX3eq9/JU/8As3vm/B9LUMSuZL037PZb1cyElSGGmmZhrbQjlMqtHLmyjQP6RR3NbOveRZfIE7TnlKrGxhVfRz9es37gNv45tfRieVSt/wAtAF+M0VEsHH1XzDvRxo3hon4pvf1m+1XPjnQMvvBkKjQBbJ9hz7xUI+YkLpFjkqn6uGUfjKE/KWGX1f8ALb4I35GQOlE/s6/+RT+AE3H2VXY3RMV3YWgvw/oZp6YqnJizf/CwfvsD+ck9Ir2cX/5eifcG/pIfS6nJih/3OD/hX+s9Ecqy6TUlcT3nGfu4mi3zE2dKi/7QD/4o+8Yar/ETNfSDWGI/9b8a9MTd0n61fuGKHuw+FX5zolvVv7a/1cfQbyxCEt78ojoejc4amdmTG4Y+GQ2H4nv5T4tMmow+ti8EnmtGpebejuy9CofVV8fW+6qpY+9SJzq2s1z6CnUG/wCxo/3sLjbKfwG3hM8Qts6AaK/SKAeygpug8A03U8AfR06O1sNTpnubE4k1WvytRUse6S/2QuGY9kOazktoFOKdb3+zRUHxdRuZOzpAxiFlf2sJhge9hUohfPKBGIplq1XKN3xFv+I+T+TnwBmWM6dw1K5D53LIQqWfKtNctJS/q9kWY6m7Ad85vpTrDUYZaYFNSLHKbtYCwBc93Kx35zZhWeS7xrrmIBzEWAHcoCqTy7IXSdD1N60Pg3CVNaLntKN1P11HPmOI7xOc6mdGll9I17Hnxk/pmiLiwNx3/kInVL3HvFKorKGUgqQCCNQQdiDNk83/ANF3TpYNg6huUBemT9W/aW/cTceJ5T0idpdzbnZp9iImsIiICIiAiIgUnS1cA6/q3H5zlOm6RYXFybXGl/O2h+DTo+kRdmvwJ/Xw/VpSYpsykHbhfjrwHcePlczy2/tXaTp5103hc6Hnb4ziatOxttPUuk8KFuSdNtbDf3a9x18ZyvS3QzXLIPEcfMcDKxuj2i9XqoAtxnYYFxbXj5zzygxpvex7502A6R0FzGRI6/8AZqZGxF9NDw5WOlvKYno5T6rn6Nsyg2y3tci19CR4HwtWYfGg7zfUxZGi/rnFx2yXTA4dlIF1NgQNxcG9/wCI++RcWgOZDuabIfcGU+5CPfNxxYsWJsP5Dcny+crf2rM5Ite9h3EEhQfvCuvgRM8ZG+VbcdhgVq2sA9BUHcQDYn4e+fHwHpziMguGFFfsrSchib8wyEDfflGIcEEX0N18DbSX3UuuiU8RUIuR6MgczZrfH5Tjz82XHx24zd+P9VjhcspjPdU/SnVh1DmrlRXZ/pC+Wpiw7EAa3CINPbHI2iVcMjs4ZtXNVmCgk2q10ZrE2FxTRVHee6dn0P6PFV3FRwzqAcvJTfYch+t5w3WHAthsSyh2VS4ZCCRxuO494M6cP8uWEuVm69l/H48P17tnv6SqeLprUVgrlzXqOosAnpKlkpas3qovPcn3w8f0oMOuQYf1USlZ2+grlmByrrmc3Yg67bbzuk8EjBlN1DZG03UHKxA8NpX9YnR1bKb2Qm5NySOJPjrEyvlJV8n4uMt1Otbl/wCqjE9b8S2a2RMxJJVLsSbA3LZuAA8BaU2NxlSqb1ajvx7TFhc8hsPKRzMTPTOny2SMB4yV0Zgmr1VQa31Y8gNzI+GoM7KiKWZjYKBckz1fqx1bXCoGqW9I2p1Gh+rf+UzK6MZtOw2GWlTVBoAOV5RdKoGPq634KASfBb3PvPdLvHYgHQX10ALaMeSk2W/cf6ylrsp113Kns63AuUKH6QGuRtxcq1xOU67q0XoHGGhjMPUB2qKCb7qxytrx0LfkJ+gZ+eko569FV1LvTAsbg5mUBgTqRyJ14HVZ+hZ04/VRm+xETogiIgIiICIiBR9MU7G/Mbj427xv5zkekKh4b7AXsLm4AvwGh14KvtT0HG4fOpHHhPN+nqZBKG4J7J5g1GpoT45S3vnDPHVdcculXSx4Or6aMQ2qnIo1ckaqDrYC2lvNiMIr01ZALMMwAuqAcGCIQXY6au1uPdIPoVqsSwsjFmZR/sqZVUpg+0+UeCGScbiHTMoF2BVbDZ6z6KgH1VAOns94kb0rSkxfRWa9wTwuAN+WnrN3Lmtzld/2c6erqPEcPn5TphimewuGuSq8my+u59gG4A5AnhMGRCGYE3Jyh7dq3EIDounzub6CPKGnPLinTRgR5G83J0mbDl8dP18/AW74X1xYWUWCnUXPFydSb307vdCqdFIc1lsBYZgcpLdwGgA566juvNmUPFordKXFh63DiBY7+RPxtzmnDOq8/M3sBoNedxe/Mtzg9FqbMjOoNyCbEWXQMRpZQToNyTfvmAwmUXzdnLfVdQpGl9dyBt3E9025M8Uhn00/RB0Pjwm/B430eZb6Na/kTl+Z98ralBxbndAR7TOgKeI1v5TU1FyQpItnyX1sciE5vsnXXuk3Dymq6ced485l9Ojp0W9L+0YZu3a5QGxB0uV11U2298l9JY3ObuASPOx7pzFKsxUBz2sqWYX1DqSoa+mhGW++178JD1VezEuDlXRVVFN13IP0jsdbA24G8m8eXp9Ti/K4MLcvv4+m1cResz1G7AUkHNqTl0XL4/rS057pDF6N7Wnlx/KXNDBUmYXNRixyqCQgzEAhcoF1exUZSdc62NzpMw2Ho6ZMOjMyM6ZrszBD21QvmGZbWykXHatfL27xw1Za8/N+Xjljccd935cVhMFUrHLSps59hSbeJ2HnOk6O6jVGIOIqLSB+gpD1DzA1Chu65Ou06Gv0mciOutN0Z0yDKHCWNRAn0aiqcwU3BymxFwZqfGCzEvdUKB2Av/Z1LehxCBvWTVQyHQZiNgMvS2vm6WPRmEw2FAXD07uw0c9qo+n0SdOBNlBBseRnytjS2oJYMCylRnzhfWKA+sy/SpmzW1FzpK2o4UutW4ptUyVlUljhq51SvSY65HsGBO9tb3F/lOqQ5Wu2XPUNOsy/4eITWniU5Zl7R4Gz33kbVpuqvcXJU3UE6lqbITZXB3aiTYEnt021va9q/EYg2IOba2p7ZRWsyORvUpsLq3d3zZUqspcMoDqXfJ9EVKZK4qkPYdLvbbVZC9CzP6NAXObKo3Zt1XxLKEv3iTWum/0cdGtXxiuw7FAMx5ZibIB97Mw+zPaZz3U7oIYPDqhsajdqoRxY8AeSjT3njOgnfGajjld19iIlsIiICIiAiIgfJQ9YuhBXXMulRbEcL5SDbxuBrL6Jlks1Wy6ePYXDNTfI6kFWpggixslSq2x4HMnvEqa1YhQ3FadWoDzeo60gfIXPjPY+lOhqdfUjK42Yb+B5i9j5CebdYur1Whm7F0KsFK6j+8V1HdqGH3hOOWFjpMpVJWsgq5dlZcOnggvUbzYD8Zm71XI4UU97ki/759yyPVAvrt6d2P2XCFT4EAzN2Nq19zWF/wDmH5zjVxtpD1FOxu7eAv8AHKCR9oTZnuFzbOWc/ZQGw8CQwmpvWqnkiL/0x8gffFdrX7qaD8WRj8zJ9L9j2OQMB2szN9lA1h4dkfikZjc0ydbmpUbvCq4Ty9U+c2YnQv7NIL/APzmjEmxf2MLYe+mD/OVKmxppNbJfhQrVjfi1R1ynyzL7hK6rWGQi2o6PRhzzlgpbzV2ljVSyVfYwlJfxBCf4ZSk9q3+7/kl/5Cd8HPJZNVVqrKBo1VV8q2EOQeAYXE10XVwtwLOuHZu/0uehWP4yrfdEi0W/tl/z+j/jQcfzmrC6UKb8Rhn/AOXjFcTohPWo1RWU3DVcNnBG4xGDZ8xFtmZUYn7YmzFY1rNVQ2YehxtO3BmITEL4Gp2rezPvR5tiaHJcfiKdvZqNTFvi/vkTBofR0lO5w+NpH7gZ1/eYGTVt9bEil6bLqlGvTxKLwyOygr4FKiDym/D0wlVKbeoKtbBvfjSqG9InwzuR9gcpAendX9vBIT9z0YH8AkrHAn0rDfPgXH2mwr3PmTJutKScJmqLSRvWq0qmGe/+0oEGiT3gtSXwUyO7l0Dnd8OjHmXw9XID4+jI98tEp2qk8F6Qrv8AdplS5/hEmdA9V69dUVV0VMrMdFBZ8zdrnYILDXflI1tlqtxAZ6gKgl3FNrAXu74amrDzOX3z0jqR1PGHtXrC9Ujsrv6MW/iI923OW/QHVmlhu1o1TixFgO5RwFtOc6CdccNd1zyy31CfYidEkREBERAREQEREBERATW6AgggEHcEXB8psiByXTHUqjVuaZyMRqN0PLTcEG+o5nTWch0n1ZxFLPmQlWsSy9pcy7MbagHW97ateetxOd45VTKx4ayEltNXUD76ZSR4nKbc7iY1tVbvRD+HKp+N57FjuhMPW/vKSkniBlb8QsZQ4rqJSbWnUdd9GAddd+R18Zyy4b8Ok5I86xWvpPaQH3kfmJpxy3atYetS0/GhnZYnqLiB6j03sCNSykjgNQR8eAlZX6p4wEE0Swy5SVZDdbaaZr3BC+6R/HlG+cc1iBda/tUKVvAD+olEF7V/93n/AKNvnO0bq5ix61Cp/dshspbZlyHT2VF/OQP/AOVxORgKFTN+yCiLowGeyltSNuyR94TrhLE5WVzlMf2o/wA/o8fhovf5THDr/qyDj+zVz+Kuqj4gzsKfVDEZiy0XIFQuoyEX9Hh8tIa7dsknu79JOwnUWuAi+iJCJSTUquYU2NR9/rVSo7lU8Z0tqJpzOBoFsRTA49JVG8kanmPxmvC0CUpNyp4yp5VVCJ73Fp6DhOodbTM6qQjJmv2r1TevUFtnYWUfVAG5l3hOpVJSCzE+r2VACgJ6q637K6m3M3OtrR45VVyjylujXKuqrqKVOgOAzvZnH3Vz35ZTOm6O6qVarZ1pnL6RGBfsqRRTJSBvra12IHMDe9vTcH0LQp2yU1uOJ1a5NybniTqTxljKmH2y5OT6J6nUqeU1T6RhfTZbk3YnixLanbhpoLdTTphQAAABsALAeAEziXJJ6Tbt9iImsIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiB//2Q==', 23, 'gatto', 5, 'lorem ipsum dolor construct flavour', 0);
$singleproduct->setParternship('Monge');
$ecommerce[] = $singleproduct;
}
catch (Exception $e) {

    echo '<h4>ERRORE</h4>';
}


$singletoys = new toys('Osso Balosso', 'https://i.ebayimg.com/images/g/e~4AAOSw-FVizBkY/s-l1200.jpg', 43, 'cane', 5, 'lorem ipsum dolor construct flavour', 0, 'plastica', false);    
$singletoys->setParternship('Monge');
$ecommerce[] = $singletoys;


$singlefood = new food('Croccantini', 'https://m.media-amazon.com/images/I/71FHpIr1ztL._AC_UF894,1000_QL80_.jpg', 13, 'cane', 5, 'lorem ipsum dolor construct flavour', 0, '24/12/92', 'pollo', 112);
$singlefood->setParternship('Monge');
$ecommerce[] = $singlefood;

$singlecage = new cage('EL piumon', 'https://www.ikea.com/ch/it/images/products/lurvig-cuccia-per-cane-grigio-chiaro__0782457_pe761330_s5.jpg', 43, 'cane', 5, 'lorem ipsum dolor construct flavour', 0, 'legno', 'medium');
$singlecage->setParternship('Monge');
$ecommerce[] = $singlecage;



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class=" container ">

        <h1 class=" text-center ">Pet House</h1>

        <div class=" d-flex">
            <?php
             foreach($ecommerce as $key => $product){
                
            ?>
            <div class="card m-3 " style="width: 18rem;">
                <img src="<?php
                    echo $product->image;
                    ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">
                    <?php
                    echo $product->name;
                    ?>
                    </h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Prezzo:
                    <?php
                    echo $product->price;
                    ?>
                    </li>
                    <li class="list-group-item">Categoria:
                    <?php
                    echo $product->category;
                    ?>
                    </li>
                    <li class="list-group-item"> Descrizione:
                    <?php
                    echo $product->descriptions;
                    ?>
                    </li>
                    <li class="list-group-item"> Tipo:
                    <?php
                    echo get_class($product);
                    ?>
                    </li>
                    <li class="list-group-item"> Partnership:
                    <?php
                    echo $product->getPartnership();
                    ?>
                    </li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link"></a>
                    <a href="#" class="card-link"></a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>

    </div>

</body>

</html>