# JWT

## Challenges

Can you crack the secret key ? It's simple



## Solution


```python
import itertools
import string
import jwt

token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE1NTQ3ODY2NjIsInVzZXJuYW1lIjoiYWJjZCIsImlhdCI6MTU1NDc4MzA2Mn0.ro2p_vLeRvRcNeKbDC6praAlYuZzcWu615DSPcVmF9s"


def jwtVerify(token,secretKey):

    try:
        jwt.decode(token,secretKey)

    except jwt.ExpiredSignatureError:

        return True
    
    except jwt.InvalidSignatureError:
        return False
    
    return True

def brute_force(charSet,strlen):

    for guess in itertools.product(charSet,repeat=strlen):

        secretKey = ''.join(guess)
        secretKey = "root@ctf{" + secretKey + "}"
        
        if jwtVerify(token,secretKey):

            print("The secret key is : ",secretKey) 
            return secretKey

        print("Processed : ",secretKey)


secretKey = brute_force(string.ascii_lowercase,8)

print("Secret Key = ",secretKey) 

```