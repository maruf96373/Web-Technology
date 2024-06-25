
#include <windows.h> // for MS Windows
#include <GL/glut.h> // GLUT, include glu.h and gl.h
#include<stdlib.h>


void display() {

    glClearColor(0.0f,0.0f,0.1f,0.0); // Set background color to black and opaque
    glClear(GL_COLOR_BUFFER_BIT);
    glBegin(GL_POLYGON);
glColor3f(1.0f,1.0f,1.0f);
glVertex2f(0.0f,0.5f);
glVertex2f(-0.2f,0.0f);
glVertex2f(-0.5f,0.0f);
glVertex2f(-0.3f,-0.5f);
glVertex2f(-0.4f,-0.10f);
glVertex2f(0.0f,-0.7f);
glVertex2f(0.4f,-0.10f);
glVertex2f(0.3f,-0.5f);
glVertex2f(0.5f,0.0f);
glVertex2f(-0.2f,0.0f);
glVertex2f(0.0f,0.5f);
glEnd();
glFlush(); // Render now
}

/* Main function: GLUT runs as a console application starting at main() */
int main(int argc, char** argv) {
    glutInit(&argc, argv);
    glutInitWindowSize(640, 480); // Set the window's initial width & height
    glutInitWindowPosition(80, 50);  // Set the window's initial position according to the monitor
    glutCreateWindow("OpenGL Setup Test"); // Create a window with the given title
    glutDisplayFunc(display); // Register display callback handler for window re-paint
    glutMainLoop(); // Enter the event-processing loop
    return 0;
}
