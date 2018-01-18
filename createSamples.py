import os

# Variables
t = 0
path = os.getcwd() + "/InteractiveTrack/"
dur = 32                        # duration of the samples
f = 0.5                         # sample decode frequency
t_s = [1, 5, 14, 21, 31]           # sample decode times for image and url
act = [1, 2, 2, 4, 3]              # image indicator
start = [2, 6, 15.2, 22, 32]       # sample presentation start time for image and url
end = [4.5, 10, 18.5, 25, 34]        # sample presentation end time for image and url


# First sample
filename = path + "sample1.tr"
file = open(filename, 'w+')
file.write(str(f) + "\n")
file.close()

# Remaining samples until the last sample
for i in range(0, int(dur/f+1)):
    
    filename = path + "sample" + str(i) + ".tr"
    file = open(filename, 'w+')
    
    file.write(str(f) + "\n")
    
    if t in t_s:
        ind = t_s.index(t)
        file.write("image_start.push(" + str(start[ind]) + ");\n")
        file.write("image_end.push(" + str(end[ind]) + ");\n\n")
        file.write('images.push("https://raw.githubusercontent.com/AdithyanIlangovan/InteractivityTrackImages/master/actor' + str(act[ind]) + '.jpg");\n')
        file.write('links.push("http://www.imdb.com/name/nm3316142/?ref_=ttfc_fc_cl_t2");\n')
        
    t += f
    file.close()
    

# Last sample
filename = path + "sample" + str(int(dur/f+1)) + ".tr"
file = open(filename, 'w+')
file.write("0\nfunction setRightVideoSuggestion() {\n\tdocument.getElementById('video').style.width 	= '50%';\n\tdocument.getElementById('video').style.width 	= '50%';\n\tdocument.getElementById('video').style.position	= 'absolute';\n\tdocument.getElementById('video').style.bottom 	= '25%';\n\tdocument.getElementById('video').style.left 	= '5%';\n\tdocument.getElementById('video').style.opacity 	= '1.0';\n\tconsole.log(\"Calling before video ends function\");\n\tdocument.getElementById(\"video_end_text\").innerHTML = \"You may be also interested in\" ;\n\tdocument.getElementById(\"img_2\").src = \"https://raw.githubusercontent.com/AdithyanIlangovan/InteractivityTrackImages/master/sintel.jpg\";\n\tdocument.getElementById(\"links_2\").href = \"https://www.youtube.com/watch?v=eRsGyueVLvQ\";\n\tdocument.getElementById(\"link_1_end\").innerHTML = \"Watch here\" ;\n\tdocument.getElementById(\"img_3\").src = \"https://raw.githubusercontent.com/AdithyanIlangovan/InteractivityTrackImages/master/bbb.png\";\n\tdocument.getElementById(\"links_3\").href = \"https://www.youtube.com/watch?v=YE7VzlLtp-4\";\n\tdocument.getElementById(\"link_2_end\").innerHTML = \"Watch here\" ;\n\t}")
file.close()