insert into step_types values (null, 'Automatic'), (null, 'Manual'), (null, 'View');

insert into process_groups values (null, 'Admission', 'Process of admission', 'Y');

insert into processes values (null, 1, 'Admission', '', 'Y');

insert into process_steps values (null, 1, 'Start', 1, 'admission', 'index'),
(null, 1, 'Form Issue', 2, 'admission', 'issue'),
(null, 1, 'Fill form', 2, 'admission', 'fillup'),
(null, 1, 'Check form', 2, 'admission', 'check'),
(null, 1, 'Allocate seat', 2, 'admission', 'seat_allocation'),
(null, 1, 'Exit', 1, 'admission', 'exit');

insert into actions values (null, 1, 1, 2, 'Start', '', '', 'POST'),
(null, 1, 2, 3, 'Issue', 'admission', 'action_issue', 'POST'),
(null, 1, 3, 4, 'Submit', 'admission', 'action_submit', 'POST'),
(null, 1, 4, 5, 'Approve', 'admission', 'action_approve', 'POST'),
(null, 1, 4, 6, 'Reject', 'admission', 'action_reject', 'POST'),
(null, 1, 5, 6, 'Close', 'admission', 'action_close', 'POST');