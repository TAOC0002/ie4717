# ie4717
A dental clinic website (IE4717 course project)
- To run MySQL and MariaDB, I used the software tool phpMyAdmin
## Site Map

## Storyboard

## Database

## Web Application Testing Plan
| Test Name | Applicable Roles | Descriptions |
| --------- | ---------------- | ------------ |
| Webpage Navigation | Dentist, Patient | All users (both dentists and patients) must be able to navigate between home page, about page, service pages, dentist pages and the login page. If a user has already logged in, clicking on the login page directs the user to the member page. |
| Change personal particulars | Dentist, Patient | Once logged in, personal information such as name and phone number of the user will be displayed on the top of the member page. The user can alter these two particulars in the database. |
| Apply for leave | Dentist | Dentists are only allowed to have one active leave at a time. Past applied leave will be automatically deleted from the database. Moreover, dentists cannot apply for leave if they have upcoming appointments during their indicated leave. |
| Cancel a leave | Dentist | Dentists can cancel a leave if the leave date has not passed yet. The dentist’s schedule will be then freed out in the database |
| Book a new appointment | Dentist, Patient | All users can book new appointments, but they cannot select time slots that are already booked or when the dentist will be on leave. Moreover, they cannot book an appointment on Sunday as the clinic closes on Sundays. |
| Reschedule an appointment | Dentist, Patient | All users can reschedule their appointments. The new time slots the users select should meet all the constraints same as the case where they book new appointments. Namely, there should be no existing appointments at that particular time slot and Sundays are not permitted. |
| Cancel an appointment | Dentist, Patient | All users can cancel their appointments. Once the action is successful, their appointments will be removed from the database. |
| Reschedule and cancelation functions disabled for past appointments | Dentist, Patient | Past appointments will still be shown on the member. However, the reschedule and cancelation functions should be removed as no actions can be done on past records. |

