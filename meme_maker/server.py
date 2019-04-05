from bottle import run, route, template, static_file, request
import subprocess
import os

IMG_FILE = "unsettled_tom.jpg"

@route("/writetext")
def writetext():
    yourtext = "\";cat text"
    command = """width=; \
    convert -background '#0008' \
   -fill white -gravity center \
   -size `identify -format %w {FILENAME}`x100 caption:"{CAPTION}" {FILENAME} \
   +swap -gravity north -composite \
   anno_caption.jpg""".format(FILENAME=IMG_FILE,
                    CAPTION=request.query["caption"])

    # print("\n\n\nCOMMAND : \n\n\n" + command + "\n\n\n")

    try:
        output = subprocess.check_output(command, shell=True)
    except subprocess.CalledProcessError:
        pass
    return "<h3>Here is your meme</h3><img \
        width=\"400px\" src='/anno'></img>"

@route("/anno")
def serve_annotated():
    return static_file("anno_caption.jpg", root=".")

@route("/base")
def serve_base():
    return static_file(IMG_FILE, root=".")

@route("/")
def index():

    if os.path.exists("anno_caption.jpg"):
        os.remove("anno_caption.jpg")

    return """<h2>Meme maker!</h2>
            <p>Simple meme maker! Make a meme using the <i>Unsettled Tom</i></p>
            <form action=\"/writetext\" type=\"POST\">
                <input type="textarea" name="caption"/>
                <button type="submit">Submit</button>
            </form>
            <img width="400px" src=\"/base\"/>"""

run(host="0.0.0.0", port="8082")
