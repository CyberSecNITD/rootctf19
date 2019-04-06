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

    if int(_a) == g.a and int(_c) == g.c:
        print(flag)
    else:
        print("Wrong values :/")


def test():
    from solve import solve
    g = LCG(100)
    print(solve([g.next() for _ in range(10)], g.m))
    print(g.a, g.c, g.m)


if __name__ == "__main__":
    # test()
    challenge()
