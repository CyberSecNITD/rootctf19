# rootctf19
CTF challenges for rootctf19

# How to contribute

1. Create a folder with the challenge name as its name. Eg. `pwn1`
2. All your files necessary for the challenge lives in this directory `pwn1`, Eg. `pwn1/pwn1.exe`
3. Add a `challenge.md` stating
  - Name of the challenge
  - Challenge hint
  - Link to the file
4. If you challenge needs hosting, i.e. A web challenge or pwn challenge. Write a `Dockerfile` so it can be automatically built and deployed. Note: The containers will be ephimeral as it should hvae been :smile:.
5. Add `solution.md` which has the instructions to solve the challenge.
