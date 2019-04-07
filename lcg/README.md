# Linear Congruent Generator (LCG)

Linear congurent generators are PRNGs designed ith simple arthemtic and modular operations so it can run fast on limited computer hardware. 

Read about it on [Wikipedia](https://en.wikipedia.org/wiki/Linear_congruential_generator)

## Challenge

Here is a LCG PRNG

```python
from secret import a, c, flag

class LCG:

    a = a
    c = c
    m = 2**32

    def __init__(self, seed):
        self.xn = seed


    def next(self):
        self.xn = (self.a * self.xn + self.c) % self.m
        return self.xn


def challenge():

    g = LCG(100)

    for _ in range(10):
        print(g.next())

    _a = input()
    _c = input()

    if _a == g.a and _c == g.c:
        print(flag)
    else:
        print("Wrong values :/")

```
running on `nc localhost 17080`

## Solution

In LCG, we have

```
x_n1 = (a * x_n + c) mod m
```

From the program, both `a` and `c` are missing, and `m` is given as `2^32`. The program first prints 10 numbers generated from the LCG, which are

```
2901179647
3706863960
4240103099
1419655212
3898826519
2440632800
463645971
3850818420
3611475887
1848986088

```

From the recurrence relation, we can say

```
x_1 = (a * x_0 + c) mod m
x_2 = (a * x_1 + c) mod m

Then,

x_2 - x_1  = (a * (x_1 - x_0)) mod m

Therefore,
a = (x_2 - x_1)/(x_1 - x_0) mod m
```

Once we know the multiplier `a`, then value of `c` can be found by simply solving for `c`

```
x_1 = (a * x_0 + c) mod m
c = (x_1 - a * x_0) mod m
```

Supply the multiplier `a` and increment `c` respectively, the program prints the flag.
