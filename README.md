# Chat Application – Web Technologies Lab

## Overview
This project is a **multi-step web application** developed as part of a university lab on web technologies.
The goal was to incrementally build a chat application by separating concerns between
**HTML structure, CSS layout, JavaScript interactivity, PHP backend logic, and Bootstrap styling**.

Each development phase focuses on a specific technology while building on the previous one.

---

## Project Scope
The application simulates a chat platform with the following views:
- Login / Logout
- Registration
- Friends list
- Chat view
- User profile and profile settings

The project evolves from static HTML pages to a fully interactive, server-backed web application.

---

## Implementation Phases

### 1. HTML – Application Structure
- Created all application views using **semantic HTML5**
- Implemented navigation between views via links and form actions
- No CSS or JavaScript used in this phase

Views implemented:
- Login
- Register
- Logout
- Friends list
- Chat view
- Profile view
- Profile settings

---

### 2. CSS – Layout and Styling
- Centralized styling in a single CSS file
- Implemented consistent layout and typography
- Styled forms, lists, tables, and links
- Added responsive behavior for smaller screen sizes

Focus:
- Separation of content and presentation
- Reusable CSS classes
- Responsive design principles

---

### 3. JavaScript – Dynamic Behavior
- Added dynamic functionality using **vanilla JavaScript**
- Implemented:
  - Form validation
  - Dynamic friend search suggestions
  - Chat message rendering
- Used DOM manipulation and AJAX requests
- Integrated a provided dummy backend service for testing

Focus:
- DOM API
- Asynchronous requests (AJAX)
- Client-side state handling

---

### 4. PHP – Server-Side Logic
- Converted HTML pages to PHP
- Implemented server-side rendering
- Handled form submissions and session management
- Centralized backend communication using service classes
- Implemented login, registration, chat, and friend management logic

Focus:
- Server-side processing
- Session handling
- Clean separation between view and logic
- Backend communication via HTTP and JSON

---

### 5. Bootstrap – UI Framework Integration
- Replaced custom CSS with **Bootstrap**
- Used Bootstrap components for:
  - Forms
  - Buttons
  - Lists
  - Modals
- Implemented Bootstrap-based form validation
- Improved usability and visual consistency

---

## Key Concepts
- Multi-layer web architecture
- Client–server communication
- Progressive enhancement
- Separation of concerns
- REST-like backend interaction
- Responsive UI design

---

## What I Learned
- How modern web applications are built step by step
- Clear separation between frontend and backend responsibilities
- Handling asynchronous communication with a backend
- Structuring maintainable PHP applications
- Using UI frameworks efficiently instead of reinventing layouts

---

## Limitations
- Backend is based on a provided dummy service
- Authentication and data persistence are simplified
- Project is intended for learning purposes, not production use

---

## Purpose
This project was developed to gain **hands-on experience with the full web stack** and to understand how
frontend and backend technologies interact in a real-world application scenario.

---

## Technologies Used
- HTML5
- CSS3
- JavaScript (Vanilla)
- PHP
- Bootstrap
